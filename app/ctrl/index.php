<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
		p(session_status());
		$this->assign('name','Hello ppphp');
	    $this->display('index.html');
	}
}