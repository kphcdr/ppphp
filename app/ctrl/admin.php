<?php
namespace app\ctrl;

use app\ctrl\baseadmin;

class admin extends \app\ctrl\baseadmin
{
	public function index()
	{
	    $this->display('admin/login.html');
	}
}