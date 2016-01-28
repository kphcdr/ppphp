<?php
namespace ppphp;
class crypt
{
	const salt = 'PPPHP';
	public function encode($str)
	{
		$all = md5(md5($str.self::salt));
		$start =  substr($all,0,16);
		$end = substr($all,16,16);
		return $start.$str.$end;
	}
	
	public function decode($str)
	{
		$str = substr($str,16);
		$str = substr($str,0,-16);
		return $str;
	}
}