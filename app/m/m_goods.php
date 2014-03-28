<?php
if ( ! defined('PPPHP')) exit('非法入口');
class goods extends model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_goods()
	{
		//$this->db->where();
$this->query("INSERT INTO test (id, name, value) VALUES (NULL,'test','jv@ttt')");	
$this->debug();	
	}	
}