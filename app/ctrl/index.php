<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
		$this->name = 'hello ppphp';
	    $this->display('index.html');
	}
}