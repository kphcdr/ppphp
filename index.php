<?php
/*
*	入口文件 
*
*
*/
	define('ENVIRONMENT', true);//调试模式
	define('PPPHP',realpath('./'));	//F:\www\git\ppphp  根目录

	//常用配置
	$Web = 'http://www.ppphp.com/'; //网站域名
	$Core = PPPHP.'/App/Core';//PPPHP框架目录
	$App = PPPHP.'/App';//程序目录
	$View = PPPHP.'/App/view/';//模板目录

	//系统路径
	define('CORE',$Core);
	define('APP', $App);
	define('VIEW', $View);
	define('WEB', $Web);
	//是否开启错误提示
	if (ENVIRONMENT)
	{

	}
	else
	{
			error_reporting(0);
	}
	//let go
	require CORE.'/pppHp.php';