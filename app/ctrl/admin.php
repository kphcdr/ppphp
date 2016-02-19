<?php
namespace app\ctrl;

use app\ctrl\baseadmin;
use ppphp\conf;
use ppphp\session;

class admin extends \app\ctrl\baseadmin
{
	public function index()
	{
	    $this->display('admin/login.html');
	}
	
	public function login()
	{
	    $name = post('name');
	    $password = post('password');
        $password = md5(conf::conf('passwordkey','key').$password);
        $adminModel = $this->m('adminModel');
        $ret = $adminModel->login($name,$password);
        if($ret) {
            //登录成功
            $session = new session();
            $session->set('id',$ret['id']);
            $session->set('name',$ret['name']);

        } else {
            //登录失败

        }
	}
	
	public function test()
	{
        $session = new session();
        p($session->get('id'));
        p($session->get('name'));
	}
}