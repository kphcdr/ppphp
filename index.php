<?php
/*
*	PPPHP入口文件 
*
*	@author kphcdr <kphcdr.163.com>
*/
	header("Content-type:text/html;charset=utf-8");
	define('ENVIRONMENT', true);//调试模式
	define('PPPHP',realpath('./'));	// 根目录
	//系统路径
	define('CORE',PPPHP.'/Core');
	define('APP', PPPHP.'/app');
	define('VIEW', PPPHP.'/app/view/');
	define('WEB', $_SERVER['PHP_SELF']);
	//是否开启错误提示以及BUG调试
	if (ENVIRONMENT)
	{
		error_reporting(E_ALL);
	}
	else
	{
		error_reporting(0);
	}
	//let go
	require CORE.'/ppphp.php';