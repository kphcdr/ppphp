<?php
/* ========================================================================
 * 全局函数
 * ======================================================================== */
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

function get($str,$filter = '',$default = false)
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
        return $default;
    }
}

function post($str,$filter = '',$default = false)
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
        return $default;
    }
}

function url($str)
{
    p($_SERVER);
    echo $str;
    return $str;
}