<?php
/* ========================================================================
 * 模型基类,当前继承于medoo
 * 主要用于连接数据库,并封装了四个常用操作
 * ======================================================================== */
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

	/**
	 * 根据ID查找一条数据
	 */
	public function getOne($id,$field = '*')
	{
		$data = $this->get($this->table,$field,array(
			"id" => $id
		));
		return $data;
	}

	/**
	 * 新增一条数据
	 */
	public function addOne($data)
	{
		return $this->insert($this->table, $data);
	}

	/**
	 * 根据ID修改一条数据
	 */
	public function setOne($id,$data)
	{
		return $this->update($this->table,$data,array(
			'id'=>$id
		));
	}

	/**
	 * 根据ID删除一条数据
	 */
	public function delOne($id)
	{
		return $this->delete($this->table,array(
			'id'=>$id
		));
	}
}