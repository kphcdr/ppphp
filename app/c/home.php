<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{

	public function index()
	{
		$this->display('index');
	}
	
	public function ss()
	{
		$m = $this->m('m');
		$result = $m->test();
		
		print_r(xdebug_print_function_stack());
	}
}