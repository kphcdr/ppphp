<?php
if( !defined('PPPHP')) exit('非法入口');
//全局函数
if(!function_exists('load'))
{
	/**
	 * 类自动加载
	 * 
	 * @param 	string 		$class_name 	类名字
	 * 
	 * @return 	boolean 	true|false
	 */	
	function load($class_name)
	{  	
		$file = PPPHP.$class_name.'.class.php';
		echo $file;
		if(is_file($file))
		{
			echo $file;
		}
		return require $class_name.'.class.php';
	}
	spl_autoload_register('load');
}