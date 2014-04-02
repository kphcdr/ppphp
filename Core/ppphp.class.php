<?php
if ( ! defined('PPPHP')) exit('非法入口');
class ppphp
{
    private $__c='home' ;//控制器的名称
    private $__a='index' ;//方法的名称
    protected $t; //模板obj
    public function __construct()
	{
        $this->t = $this->b('T');
	}
	//go!go!go!
	public function go()
	{
		$this->__route();
		//判断是否存在类和方法
		if(!file_exists(APP.'/c/c_'.$this->__c.'.php')) 
		{
			show_error('控制器'.$this->__c.'不存在');
			
		}
		else
		{
			include APP.'/c/'.$this->__c.'.php';
		}
		$c = new $this->__c;
		if(!method_exists($c,$this->__a))
		{
			show_error('方法'.$this->__a.'不存在');
		}
		$a = $this->__a;
		$c->$a();
	}
	//路由分发
	private function __route()
	{
		//URL  http://xxx.com/index.php/c/a/
		if(isset($_SERVER['PATH_INFO']))
		{
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
	}
	 //调用lib
	 //$lib 类名称
	 //return obj
	protected function b($lib)
	{
		//引入lib
		if(!file_exists(APP.'/lib/'.$lib.'.class.php')) 
		{
			show_error('库'.$lib.'不存在');
		}
		else
		{
			include_once APP.'/lib/'.$lib.'.class.php';
		}
		$lib = new $lib();
		return $lib;//返回OBJ
	}
	//调用model
	//$model 模型名称
	//return obj
	protected function m($model)
	{
		//include 模型
		if(!file_exists(APP.'/m/m_'.$model.'.php')) 
		{
			show_error('m'.$model.'不存在');
		}
		else
		{
			include_once APP.'/m/m_'.$model.'.php';
		}
		$model = new $model();
		return $model;//返回OBJ
	}
	//渲染视图
	protected function display($tpl,$data = '')
	{
		if(!empty($data))
		{
			if(is_array($data))
			{
				foreach($data as $key=>$a)
				{
					$this->t->assign($key,$a);
				}
			}
			else
			{
				$this->t->assign('data',$data);
			}
		}
		
		$this->t->display($tpl.'.tpl');
	}
}