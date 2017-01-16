<?php
session_start();
/* ========================================================================
 * 框架加载文件，用于引导框架启动
 * ======================================================================== */
define('TIME', $_SERVER['REQUEST_TIME']);
define('PPPHP_VERSION','2.1.2');
if(DEBUG && PHP_SAPI != 'cli') {
    //打开PHP的错误显示
    ini_set('display_error',1);
    //载入友好的错误显示类
    $whoops = new \Whoops\Run;
    $errorPage = new \Whoops\Handler\PrettyPageHandler;
    $errorPage->setPageTitle("PPPHP出大事啦!!!");
    $whoops->pushHandler($errorPage);
    $whoops->register();
} else {
    ini_set('display_error',0);
}
//加载类库
include CORE .'function/function.php';
//加载核心文件
include CORE . 'ppphp.php';
//注册自动加载
spl_autoload_register('\ppphp::load');

if(PHP_SAPI == 'cli') {
    \ppphp_cli::run();
} else {
    //开始跑框架
    \ppphp::run();
}
