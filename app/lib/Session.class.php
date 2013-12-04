<?php
/**
 * session 操作类
 * @author 张森  2013-08-27
 */
class Session{

	/**
	 * 创建一个session
	 * @param string $sessionName  session名称
	 * @param string $value session值
	 * @return string 创建的session的值
	 */
	function setSession($sessionName,$value)
	{
		return $_SESSION[$sessionName] = $value;
	}

	/**
	 * 根据sessionName获取session值
	 * @param string $sessionName
	 * @return string session的值如果没有此session，返回空。
	 */
	function getSession($sessionName)
	{
		return isset($_SESSION[$sessionName]) ? $_SESSION[$sessionName] : '';
	}

	/**
	 * 删除一个session
	 * @param string $sessionName
	 */
	function drop($sessionName)
	{
		unset($_SESSION[$sessionName]);
		return TRUE;
	}
}