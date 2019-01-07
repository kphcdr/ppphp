<?php

session_start();
/* ========================================================================
 * 框架加载文件，用于引导框架启动
 * ======================================================================== */
define('TIME', $_SERVER['REQUEST_TIME']);
define('PPPHP_VERSION', '2.3.0');
define('PPPHP', realpath(__DIR__ . '/../'));    // 根目录

//环境配置加载
\ppphp\ppphp::development();


//如果是多模块,可以通过动态设置module的形式,动态条用不同模块
$MODULE_NAME = 'app';
define('DEBUG', getenv("APP_DEBUG"));//调试模式
//系统路径
define('CORE', PPPHP . '/core/');
define('MODULE', $MODULE_NAME);
define('APP', PPPHP . '/' . MODULE . '/');

//加载函数库
include CORE . 'function/function.php';
\ppphp\ppphp::init();



//设置默认市区
date_default_timezone_set(\ppphp\conf::get('TIMEZONE', 'system'));


if (PHP_SAPI == 'cli') {

    \ppphp\ppphpCli::run();
}
else {
    //开始跑框架

    \ppphp\ppphp::run();
}
