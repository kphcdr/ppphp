<?php
if ( ! defined('PPPHP')) exit('非法入口');

class index extends ppphp 
{

	public function indexs()
	{
		$this->display('index');
	}
	public function test()
	{

	}
    public function about()
    {
		$this->display('about');
    }
    public function content()
    {
		$this->display('content');
    }
    public function home()
    {
    	echo 'home';
    }
}