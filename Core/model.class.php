<?php
if ( ! defined('PPPHP')) exit('非法入口');
//引入ezsql
$db = conf('config');
include CORE.'/db/'.$db['type'].'/'.$db['type'].'.php';
unset($db);


class model extends ppphpm
{
	public function __construct()
	{
		$db = conf('config');
		$this->ppphpm($db['dbuser'],$db['dbpassword'],$db['dbname'],$db['dbhost'],$db['encoding']);
	}
}