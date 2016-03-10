<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;

use admin\model\adminModel;

class login extends \ppphp
{
	public function index()
	{
		$this->display('login/index.html');
	}

	public function login()
	{

		$adminModel = new adminModel();
		$ret = $adminModel->login();
		if($ret['status'] != 0) {
			echo $ret['message'];
		} else {
			echo $ret['message'];
		}
	}
}