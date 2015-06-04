<?php
if ( ! defined('PPPHP')) exit('非法入口');
//引入ezsql
$db = conf('database');
include CORE.'/db/medoo.php';
unset($db);


class model extends medoo
{
	public function __construct()
	{
		$db = conf('database');
		parent::__construct($db);
	}
}