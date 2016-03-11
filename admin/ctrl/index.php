<?php
/**
 * 示例控制器
 */
namespace admin\ctrl;


use ppphp\session;

class index extends \admin\ctrl\common
{
	public function index()
	{
		
		$this->display('Index/index.html');
	}
}