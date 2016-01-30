<?php
namespace app\ctrl;

use app\ctrl\baseadmin;

class admin extends \app\ctrl\baseadmin
{
	public function index()
	{
	    $this->display('admin/login.html');
	}
	
	public function login()
	{
	    $data['name'] = post('name');
	    $data['password'] = post('password');
	    p($data);
	}
	
	public function test()
	{
	    $adminModel = $this->m('adminModel');
	    $ret = $adminModel->addOne(['name'=>'sdf','password'=>'password']);
	    p($adminModel->last_query());
	    p($adminModel->error());
	    p($ret);
	}
}