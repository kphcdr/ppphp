<?php
namespace app\ctrl;

use ppphp\model;
use ppphp\session;
use ppphp\url;

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
        $route = new \ppphp\route();
        p($route->urlVar(0));
	}

}