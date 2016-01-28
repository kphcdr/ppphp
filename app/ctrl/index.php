<?php
namespace app\ctrl;

class index extends \ppphp
{
	public function index()
	{
		$demo = $this->m('demoModel');
		$demo = $this->m('demoModel');
		$demo = $this->m('demoModel');
		$demo = $this->m('demoModel');
		$demo = $this->m('demoModel');
		
		
		$demo->insert('test',['title'=>'sdfa']);
	}
}