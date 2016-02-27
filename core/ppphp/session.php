<?php
/**
 * session 操作类
 * @author 张森  2013-08-27
 */
namespace ppphp;

class session{

	/**
	 * session初始化
	 * @author kphcdr 2014-5-19
	 */
	function __construct()
	{
		session_start();
	}
	function set($sessionName,$value)
	{
		return $_SESSION[$sessionName] = $value;
	}

	/**
	 * 根据sessionName获取session值
	 * @param string $sessionName
	 * @return string session的值如果没有此session，返回空。
	 */
	function get($sessionName)
	{
		return isset($_SESSION[$sessionName]) ? $_SESSION[$sessionName] : '';
	}

	/**
	 * 删除一个session
	 * @param string $sessionName
	 */
	function drop($sessionName)
	{
		if(isset($sessionName))
		{
		unset($_SESSION[$sessionName]);
		return TRUE;
		}
		return False;
	}
	function dropall()
	{
		if(isset($_SESSION))
		{
			session_unset();
		}
	}
}