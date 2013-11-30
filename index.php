<?php
/*
*	PPPHP入口文件 
*
*	@author kphcdr <kphcdr.163.com>
*/
	header("Content-type:text/html;charset=utf-8");
	define('ENVIRONMENT', 1);//调试模式
	define('PPPHP',realpath('./'));	//F:\www\git\ppphp  根目录
	//常用配置
	$Web = 'http://www.ppphp.com/'; //网站域名
	$Core = PPPHP.'/app/Core';//PPPHP框架目录
	$App = PPPHP.'/app';//程序目录
	$View = PPPHP.'/app/view/';//模板目录
	//系统路径
	define('CORE',$Core);
	define('APP', $App);
	define('VIEW', $View);
	define('WEB', $Web);
	//是否开启错误提示
	if (ENVIRONMENT)
	{
			error_reporting(E_ALL);
	}
	else
	{
			error_reporting(0);
	}
	//let go
	require CORE.'/pppHp.php';