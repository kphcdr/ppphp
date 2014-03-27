<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{
	public function home()
	{

	}
	public function index()
	{
		$m = $this->m('goods');
		$m->get_goods();
        $t = $this->b('T');
        $a = 'index';
        $t->assign('a',$a);
        $t->display('index.tpl');
        debug();

	}
	public function t()
	{
		print_r($db);

		$this->index();

	}
}