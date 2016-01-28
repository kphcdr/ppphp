<?php
//demo类，用于展示各种方法的使用方法
class demoModel extends \ppphp\model
{
	public $table = 'test';
	
	public function getOne($id,$field = '*')
	{
		$data = $this->get($this->table,$field,array(
				"id" => $id
		));
		return $data;
	}
	
	public function lists($field = '*')
	{
		$data = $this->select($this->table,$field,array(
				
		));
		return $data;
	}
	
	public function addOne($data)
	{
		return $this->insert($this->table, $data);
	}
	
	public function setOne($id,$data)
	{
		return $this->update($this->table,$data,array(
				'id'=>$id
			));
	}
	
	public function delOne($id)
	{
		return $this->delete($this->table,array(
			'id'=>$id
			));
	}
}