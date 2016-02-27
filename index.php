<?php 
/* ========================================================================
 * PPPHP入口文件，用于定义常量
 * ======================================================================== */
define('DEBUG', true);//调试模式

define('PPPHP',realpath('./'));	// 根目录
//系统路径
define('CORE',PPPHP.'/core/');
define('APP', PPPHP.'/app/');
define('MODULE', 'app');
//载入composer
include 'vendor/autoload.php';
if(DEBUG) {
    //打开PHP的错误显示
    ini_set('display_error','On');
    //载入友好的错误显示类
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}
include CORE.'init.php';
