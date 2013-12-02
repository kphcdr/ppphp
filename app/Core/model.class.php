<?php
if ( ! defined('PPPHP')) exit('非法入口');
//引入EZSQL 文件
include_once CORE.'/db/'.$db['type'].'/'.$db['type'].'.php';



class model extends ppphpm
{
	//初始化
	//$db array 
	public function model()
	{
		echo 1;
	}
}