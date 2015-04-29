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
		$result = scandir('db');
		array_shift($result);array_shift($result);
		$list = array();
		foreach($result as $key=>$a)
		{
			$list[$key]['time'] = substr($a,0,10);
			$list[$key]['title'] = file_get_contents('db/'.$a);
		}
		$data['list'] = $list;
		$this->display('index',$data);
	}
    public function about()
    {
		$this->display('about');
    }
    public function content()
    {
		$this->display('content');
    }
}