<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


class login extends \ppphp
{
	public function index()
	{
		$this->display('login/index.html');
	}

	public function login()
	{
		$data = post();
		p($data);
	}
}