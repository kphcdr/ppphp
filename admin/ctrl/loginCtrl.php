<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;

use admin\model\adminModel;

class loginCtrl extends baseCtrl
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
			json($ret);

		} else {
			json($ret);
		}
	}

	public function logout()
	{
		$adminModel = new adminModel();
		$adminModel->loginout();

		redirect('/');

	}
}