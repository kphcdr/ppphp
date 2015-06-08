<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{

	public function index()
	{
		$this->display('index');
	}
}