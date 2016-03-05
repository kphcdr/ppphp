<?php 
/* ========================================================================
 * PPPHP入口文件，用于定义常量
 * ======================================================================== */
//如果是多模块,可以通过动态设置module的形式,动态条用不同模块
if($_SERVER['HTTP_HOST'] == 'ppphpadmin.m.com') {
    $MODULE_NAME = 'admin';
} else {
    $MODULE_NAME = 'app';
}
define('DEBUG', true);//调试模式

define('PPPHP',realpath('./'));	// 根目录
//系统路径
define('CORE',PPPHP.'/core/');
define('APP', PPPHP.'/'.$MODULE_NAME.'/');
define('MODULE', $MODULE_NAME);
//载入composer
include 'vendor/autoload.php';
if(DEBUG) {
    //打开PHP的错误显示
    ini_set('display_error','On');
    //载入友好的错误显示类
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
} else {
    ini_set('display_error','Off');
}
include CORE.'init.php';
