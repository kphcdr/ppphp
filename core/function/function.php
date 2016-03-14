<?php
/* ========================================================================
 * 全局函数
 * ======================================================================== */
/**
 * 更漂亮的数组或变量的展现方式
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else if (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
    }
}

/**
 * 获取get数据
 * @param $str 变量名
 * @param $filter 过滤方式 int为只支持int类型
 * @param $default 默认值 当获取不到值时,所返回的默认值
 * @return mix
 */
function get($str='false',$filter = '',$default = false)
{
    if(isset($_GET[$str]))
    {
        $return = $_GET[$str];
        switch ($filter)
        {
            case 'int':
                if (!is_numeric($return))
                {
                    return $default;
                }
                break;
            default:$return = htmlspecialchars($return);

        }
        return $return;
    } else {
        return $_GET;
    }
}

/**
 * 获取post数据
 * @param $str 变量名
 * @param $filter 过滤方式 int为只支持int类型
 * @param $default 默认值 当获取不到值时,所返回的默认值
 * @return mix
 */
function post($str=false,$filter = '',$default = false)
{
    if(isset($_POST[$str]))
    {
        $return = $_POST[$str];
        switch ($filter)
        {
            case 'int':
                if (!is_numeric($return))
                {
                    return $default;
                }
                break;
            default:$return = htmlspecialchars($return);

        }
        return $return;
    } else {
        return $_POST;
    }
}

function redirect($str)
{
    header('Location:'.$str);
}

function http_method()
{
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return 'POST';
    } else {
        return 'GET';
    }
}

function error($str)
{
    echo $str;
}