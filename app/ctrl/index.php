<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
		$this->assign('name','Hello ppphp');
	    $this->display('index.html');
	}
}