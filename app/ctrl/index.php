<?php
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
	    p($_SERVER['PATH_INFO']);
	}
}