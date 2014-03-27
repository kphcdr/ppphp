<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{
	public function home()
	{

	}
	public function index()
	{
        $t = $this->b('T');
        $a = 'index';
        $t->assign('a',$a);
        $t->display('index.tpl');
	}
}