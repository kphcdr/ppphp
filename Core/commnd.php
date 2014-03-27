<?php
function conf($conf)
{
	$file = APP.'/conf/'.$conf.'.php';
	if(file_exists($file))
	{
		$return = include_once $file;
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