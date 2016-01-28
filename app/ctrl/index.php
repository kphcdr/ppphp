<?php
namespace app\ctrl;


class index extends \ppphp
{
	public function index()
	{
	    $data = ['test'=>'asdf'];
	    $this->t = 't';
		$this->display('index.html',$data);
	}
}