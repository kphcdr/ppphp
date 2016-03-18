<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;

use admin\model\categoryModel;

class articleCtrl extends \admin\ctrl\commonCtrl
{
	public function index()
	{

	}

	public function category()
	{
		$articleModel = new categoryModel();
		$data = $articleModel->all();
		
	}
}