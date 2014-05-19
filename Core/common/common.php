<?php
function conf($conf)
{
	$systemfile = CORE.'/conf/'.$conf.'.php';
	$appfile = APP.'/conf/'.$conf.'.php';
	if(file_exists($appfile))
	{
		$return = include $appfile;
	}
	else
	{		
		if(file_exists($systemfile))
		{
			$return = include $systemfile;
		}
		else 
		{
			show_error('没有这个配置文件');
			$return = NULL;
		}	
	}
	return $return;
}
//中断语句，输出错误信息
function show_error($message)
{
	exit($message);
}
//输出变量
function s($param)
{
	var_dump($param);
}