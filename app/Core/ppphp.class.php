<?php
if ( ! defined('PPPHP')) exit('非法入口');
class ppphp
{
	private $__c='home' ;//控制器的名称
	private $__a='index' ;//方法的名称
	
	public function ppphp()
	{

	}
	//go!go!go!
	public function go()
	{
		$this->__route();
		//判断是否存在类和方法
		if(!file_exists(APP.'/c/c_'.$this->__c.'.php')) 
		{
			exit('控制器'.$this->__c.'不存在');
		}
		else
		{
			include APP.'/c/c_'.$this->__c.'.php';
		}
		$c = new $this->__c;
		if(!method_exists($c,$this->__a))
		{
			exit('方法'.$this->__a.'不存在');
		}
		$a = $this->__a;
		$c->$a();
	}
	//路由分发
	private function __route()
	{
		//URL  http://xxx.com/index.php/c/a/
		$path = trim($_SERVER['PATH_INFO'], '/');
		$path = explode('/', $path);
		$c= array_shift($path);
		$a= array_shift($path);
		if($c)
		{
		$this->__c = $c;
		}
		if($a)
		{
		$this->__a = $a;
		}
	}
	 //调用lib
	 //$lib 模型名称
	 //return obj
	protected function lib($lib)
	{
		//引入lib
		if(!file_exists(APP.'/lib/'.$lib.'.class.php')) 
		{
			exit('lib'.$lib.'不存在');
		}
		else
		{
			include APP.'/lib/'.$lib.'.class.php';
		}
		$lib = new $lib();
		return $lib;//返回实例
	}
}