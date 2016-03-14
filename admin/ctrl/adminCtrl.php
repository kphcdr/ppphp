<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


use admin\model\adminModel;

class adminCtrl extends \admin\ctrl\commonCtrl
{
	public function __construct()
	{
		parent::__construct();
		if(DEBUG) {
			new
		}
	}

	public function index()
	{
		$adminModel = new adminModel();
		$data = $adminModel->adminList();
		$this->assign('data',$data);
		$this->display('admin/admin.html');
	}
}