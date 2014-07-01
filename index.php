<?php
/*
*	PPPHP入口文件 
*
*	@author kphcdr <kphcdr.163.com>
*/
	header("Content-type:text/html;charset=utf-8");
	define('ENVIRONMENT', 1);//调试模式
	define('PPPHP',realpath('./'));	//F:\www\git\ppphp  根目录
	//系统路径
	define('CORE',PPPHP.'/Core');
	define('APP', PPPHP.'/app');
	define('VIEW', PPPHP.'/app/view/');
	define('WEB', 'http://p.com/');
	//是否开启错误提示以及BUG调试
	if (ENVIRONMENT)
	{
		error_reporting(E_ALL);
		require  CORE.'/lib/krumo/class.krumo.php';
	}
	else
	{
		error_reporting(0);
	}
	//let go
	require CORE.'/ppphp.php';