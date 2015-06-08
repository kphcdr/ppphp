<?php
if ( ! defined('PPPHP')) exit('非法入口');
class m extends model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function test()
	{
		return $this->select('help_category','*');
	}
	public function lists()
	{
		return $this->select('test','*',array('id[>=]'=>'1','LIKE'=>array('name'=>'1234'),'LIMIT'=>array(0, 100)));
	}
	public function get_usenamepassword($arr)
	{
		$data['and'] = $arr;
		return $this->get('tucao_m', 'id' ,$data);
	}
	public function add($data)
	{
		return $this->insert('tucao_m', $data);
	}
	public function del()
	{
		return $this->delete('tucao_m', array('name'=>'kph'));
	}
	public function set()
	{
		return $this->update('tucao_m',array('name'=>'1234'),array('name'=>'123'));
	}
}