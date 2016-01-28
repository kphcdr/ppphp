<?php
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
		$cookie = new \ppphp\cookie();
        $session = new \ppphp\session();
        
        $session->set('sd','sa');
        
        p($session->get('sd'));
	}
}