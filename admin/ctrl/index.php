<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


use ppphp\session;

class index extends \admin\ctrl\base
{
	public function index()
	{
		$session = new session();
		p($session->get('id'));
		p($session->get('username'));
	}
}