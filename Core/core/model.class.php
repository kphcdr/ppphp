<?php
if ( ! defined('PPPHP')) exit('非法入口');

class model extends medoo
{
	public function __construct()
	{
		$db = conf('database');
		parent::__construct($db);
	}
}