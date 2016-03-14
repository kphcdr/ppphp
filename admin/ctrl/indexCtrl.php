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

		$this->display('index/index.html');
	}
}