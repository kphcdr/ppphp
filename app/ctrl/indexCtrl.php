<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class indexCtrl extends \ppphp
{
	public function index()
	{
		$data['title'] = 'title';
		$data['content'] = 'content';

		$this->assign('data',$data);
		$this->display('index.html');
	}
}