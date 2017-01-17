<?php
/* ========================================================================
 * 全局函数
 * ======================================================================== */
/**
 * 更漂亮的数组或变量的展现方式
 */
function p($var)
{
    if (is_cli()) {
        if (is_array($var) || is_object($var)) {
            dump($var);
        } else {
            echo PHP_EOL;
            echo "\e[31m" . $var . "\e[37m" . PHP_EOL;
            echo PHP_EOL;
        }
    } else {
        if (is_bool($var)) {
            var_dump($var);
        } else if (is_null($var)) {
            var_dump(NULL);
        } else {
            echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
        }
    }
}

function debug(...$var)
{
    if (function_exists('dump')) {
        array_walk($var, function ($v) {
            dump($v);
        });
    } else {
        array_walk($var, function ($v) {
            print_r($v);
        });
    }
    exit();
}

function is_cli()
{
    return PHP_SAPI == 'cli';
}

/**
 * 获取get数据
 * @param string $str 变量名
 * @param string $filter 过滤方式 int为只支持int类型
 * @param string $default 默认值 当获取不到值时,所返回的默认值
 * @return mix
 */
function get($str = 'false', $filter = '', $default = false)
{
    if ($str !== false) {
        $return = isset($_GET[$str]) ? $_GET[$str] : false;
        if ($return) {
            switch ($filter) {
                case 'int':
                    if (!is_numeric($return)) {
                        return $default;
                    }
                    break;
                default:
                    $return = htmlspecialchars($return);

            }
            return $return;
        } else {
            return $default;
        }
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
function post($str = false, $filter = '', $default = false)
{
    if ($str !== false) {
        $return = isset($_POST[$str]) ? $_POST[$str] : false;
        if ($return !== false) {
            switch ($filter) {
                case 'int':
                    if (!is_numeric($return)) {
                        return $default;
                    }
                    break;
                default:
                    $return = htmlspecialchars($return);

            }
            return $return;
        } else {
            return $default;
        }
    } else {
        return $_POST;
    }
}

function redirect($str)
{
    header('Location:' . $str);
}

function http_method()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return 'POST';
    } else {
        return 'GET';
    }
}

function json($array)
{
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($array);
}

function show404()
{
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit();
}