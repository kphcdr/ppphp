<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


use ppphp\session;

class indexCtrl extends \admin\ctrl\commonCtrl
{
	public function index()
	{
		redirect('/admin');
	}

	public function clear()
	{
		$cache = new \ppphp\cache();
		$cache->clear();
		redirect('/admin');
	}
}