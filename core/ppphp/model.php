<?php
namespace ppphp;
class model extends \medoo
{
	protected $m;
	protected $database_type;
	protected $database_name;
	protected $server;
	protected $username;
	protected $password;

	protected $table;
	
	public function __construct()
	{
		parent::__construct(conf::all('database'));
	}

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