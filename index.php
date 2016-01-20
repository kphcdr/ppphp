<?php 
/* ========================================================================
 * PPPHP入口文件，用于定义常量
 * ========================================================================
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/kphcdr/ppphp/master/LICENSE)
 * ======================================================================== */
define('DEBUG', true);//调试模式

define('PPPHP',realpath('./'));	// 根目录
//系统路径
define('CORE',PPPHP.'/core/');
define('APP', PPPHP.'/app/');
include 'vendor/autoload.php';
if(DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}
include CORE.'init.php';
