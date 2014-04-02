<?php
function conf($conf)
{
	$file = APP.'/conf/'.$conf.'.php';
	if(file_exists($file))
	{
		$return = include $file;
	}
	else
	{
		$return = NULL;	
	}
	return $return;
}

function debug()
{
	xdebug_print_function_stack('debug');
}
//中断语句，输出错误信息
function show_error($message)
{
	echo $message.'1';
	exit();
}