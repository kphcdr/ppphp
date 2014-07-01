<?php
if ( ! defined('PPPHP')) exit('非法入口');

class admin extends ppphp 
{
	private $nopower = array('login','index');#不需要检查权限的方法
	public function __construct()
	{
		parent::__construct();
		if(!in_array($this->__a, $this->nopower))
		{
			$this->__checkpower();
		}
	}
	public function index()
	{
		$this->display('index');
	}
	public function login()
	{
		if(is_post())
		{
			$data['username'] = post('username');
			$data['password'] = md5(post('password').'kphcdr');
			$m = $this->m('m');
			$id = $m->get_usenamepassword($data);
			$this->session()->set('id',$id);
			$this->cookie();
			debug('');
			krumo::classes($data);
		}
		else
		{
			$this->display('login');
		}
	}
	public function lists()
	{
		$this->display('lists');
	}	
	public function js()
	{
		$this->display('js');
	}
	public function form()
	{
		$this->display('form');
	}
	public function error()
	{
		$this->display('error');
	}
	private function __checkpower()
	{
		//检查session
		$id = $this->session()->get('id');
		if(empty($id))
		{
			jump('admin/login');
		}
		//检查cookies
		exit();
	}
}