<?php
/*
*	入口文件 
*
*
*/
	define('ENVIRONMENT', true);//调试模式
	define('PPPHP',realpath('./'));	//F:\www\git\ppphp  根目录

	//常用配置
	$Core = 'App/Core';
	$App = 'App';
	$View = 'App/view/';

	//系统路径
	define('CORE',$Core);
	define('APP', $App);
	define('VIEW', $View);

	//是否开启错误提示
	if (ENVIRONMENT)
	{
			if(PHP_VERSION > '5.3.0')
			{
			include (CORE.'/Php_error.php');
			\php_error\reportErrors();
			}
			error_reporting(E_ALL);
	}
	else
	{
			error_reporting(0);
	}
	//let go
	require CORE.'/pppHp.php';