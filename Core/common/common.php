<?php
if ( ! defined('PPPHP')) exit('非法入口');
	function conf($conf)
	{
		$systemfile = CORE . '/conf/' . $conf . '.php';
		$appfile    = APP . '/conf/' . $conf . '.php';
		if (file_exists($appfile))
		{
			$return = include $appfile;
		}
		else
		{
			if (file_exists($systemfile))
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
	//把错误信息写入日志
	function show_error($message = '',$tag='PPPHP')
	{
		$log_path = APP.'/tmp/log';
		if(!is_dir($log_path))
		{
			mkdir($log_path);
		}
		$date = '/'.date('Y-m-d',TIME).'.log';
		$message = $tag.'|'.date('Y-m-d H:i:s',TIME).'|'.$message. PHP_EOL;
		$file = fopen($log_path.$date,"a");
		fwrite ($file,$message);
		fclose($file);
		if(DEBUG)
		{
			exit($message);
		}
		else
		{
			exit();
		}
	}
	/**
	 * 跳转页面
	 * @param $url
	 */
	function jump($url)
	{
		//判断是否需要为$url拼接
		if(strpos($url,'http://'))
		{
			$url = url($url);
		}
		//@FIXME
		header("Location: " . $url);
		exit();
	}
	function url($url)
	{
		//拼接URL
		$url = WEB.$url;
		return $url;
	}	
	function is_post()
	{
		if (isset($_POST) && !empty($_POST))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}