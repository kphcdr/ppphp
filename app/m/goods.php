<?php
if ( ! defined('PPPHP')) exit('非法入口');
class goods extends model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function lists()
	{
		return $this->select('test','*',array('id[>=]'=>'1','LIKE'=>array('name'=>'1234'),'LIMIT'=>array(0, 100)));
	}
	public function add()
	{
		return $this->insert('test', array('name'=>'kph'));
	}
	public function del()
	{
		return $this->delete('test', array('name'=>'kph'));
	}
	public function set()
	{
		return $this->update('test',array('name'=>'1234'),array('name'=>'123'));
	}
}