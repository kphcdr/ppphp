<?php
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
	    $ret = parse_url('http://ppapi.m.com/index/index');
	    p($ret);
	    p($_SERVER);
	}
}