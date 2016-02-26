<?php
namespace app\ctrl;

use ppphp\model;
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
        $auth = new \helper\auth\auth();
        $ret = $auth->login($name,$password);
        if($ret) {

        }
        p($auth->message);
	}
	
	public function test()
	{
        $session = new session();
        p($session->get('id'));
        p($session->get('name'));
	}

    public function sdf()
    {
        $help = new \helper\ctrl\index();
        $help->name = 'sdf';

        $h = new \helper\ctrl\index();
        echo $help->name;
    }
}