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
/**
 * 跳转页面
 * @param $url
 */
function jump($url)
{
	$url = url($url);
	//@FIXME
	header("Location: /".$url); 
	exit();
}
function url($url)
{
    //拼接URL
    $url = 'index.php/'.$url;
    return $url;
}
function debug($str)
{
	if(method_exists('krumo',$str))
	{
		krumo::$str();
	}
	else 
	{
		return NULL;
	}
}
/**
 * 获取POST参数
 * @param str $name post名称 
 * @param str $filter 过滤方式 int 
 * @todo 更多的过滤方法
 */
function post($name,$filter='')
{
	if(isset($_POST[$name]))
	{
		$param = $_POST[$name];
		switch($filter)
		{
			case 'int':if(is_numeric($param)){$return = $param;}else {return FALSE;}break;
			
			default: $return = $param;break;
		}
		//是否开启魔术方法
		if(!get_magic_quotes_gpc())
		{
			$return = addslashes($return);
		}
		return $return;
	}
	else 
	{
		return FALSE;
	}
}
function is_post()
{
	if(isset($_POST)&&!empty($_POST))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
