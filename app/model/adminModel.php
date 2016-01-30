<?php
//demo类，用于展示各种方法的使用方法
class adminModel extends \ppphp\model
{
	public $table = 'admin';
	
	public function getOne($id,$field = '*')
	{
		$data = $this->get($this->table,$field,array(
				"id" => $id
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