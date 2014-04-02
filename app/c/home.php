<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['a'] = '12s';
		$this->display('index',$data);
	}
}