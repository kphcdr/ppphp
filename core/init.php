<?php

session_start();
/* ========================================================================
 * 框架加载文件，用于引导框架启动
 * ======================================================================== */
define('TIME', $_SERVER['REQUEST_TIME']);
define('PPPHP_VERSION', '2.1.2');
define('PPPHP', realpath(__DIR__ . '/../'));    // 根目录

//环境配置加载
\ppphp\ppphp::development();

//如果是多模块,可以通过动态设置module的形式,动态条用不同模块
$MODULE_NAME = 'app';
define('DEBUG', getenv("APP_DEBUG"));//调试模式
//系统路径
define('CORE', PPPHP . '/core/');
define('APP', PPPHP . '/' . $MODULE_NAME . '/');
define('MODULE', $MODULE_NAME);


\ppphp\ppphp::init();


if (DEBUG) {
    //打开PHP的错误显示
    ini_set('display_errors', true);
    //载入友好的错误显示类
    $whoops    = new \Whoops\Run;
    if(PHP_SAPI == 'cli') {
        $handler = new \Whoops\Handler\PlainTextHandler();
    } else {
        $handler = new \Whoops\Handler\PrettyPageHandler();
        $handler->setPageTitle("PPPHP出大事啦!!!");
    }
    $whoops->pushHandler($handler);
    $whoops->register();
}
else {
    ini_set('display_errors', false);
}
//加载函数库
include CORE . 'function/function.php';

//设置默认市区
date_default_timezone_set(\ppphp\conf::get('TIMEZONE', 'system'));


if (PHP_SAPI == 'cli') {

    \ppphp\ppphpCli::run();
}
else {
    //开始跑框架

    \ppphp\ppphp::run();
}
