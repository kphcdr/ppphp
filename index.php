<?php
use CutePHP\Route\Route;
use CutePHP\Route\Router;
/*
*	PPPHP入口文件 
*
*	@author kphcdr <kphcdr.163.com>
*/
define('DEBUG', true);//调试模式
define('PPPHP',realpath('./'));	// 根目录
//系统路径
define('CORE',PPPHP.'/Core');
define('APP', PPPHP.'/app');
define('VIEW', PPPHP.'/app/view');
define('WEB', $_SERVER['PHP_SELF']);
//let go
require 'vendor/autoload.php';


require CORE.'/core/ppphp.php';