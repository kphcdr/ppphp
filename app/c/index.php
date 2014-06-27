<?php
if ( ! defined('PPPHP')) exit('非法入口');

class index extends ppphp 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = 'PPPHP框架';
		$this->display('index',$data);
	}
    public function about()
    {
		//$this->display('about');
    }
    public function content()
    {
		//$this->display('content');
    }
}