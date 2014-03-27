<?php
if ( ! defined('PPPHP')) exit('非法入口');
//引入ezsql
$db = conf('config');
include_once CORE.'/db/'.$db['type'].'/'.$db['type'].'.php';
unset($db);


class model extends ppphpm
{

	public function model()
	{
		
	}
}