<?php
if ( ! defined('PPPHP')) exit('非法入口');
class ppphp
{
    private $__c;//默认控制器的名称
    private $__a;//默认方法的名称
    protected $t; //模板obj
    public function __construct()
	{
	}
	//go!go!go!
	public function go()
	{
		$this->__route();
		
		//判断是否存在类和方法
		if(!file_exists(APP.'/c/'.$this->__c.'.php')) 
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
			//把GET数据分解到$this->pathinfo
			for($i=0;$i<count($path);$i=$i+2)
			{
				$this->pathinfo[$path[$i]] = $path[$i+1];
			}
		}
		else 
		{
			$config = conf('setting');
			$this->__c = $config['c'];
			$this->__a = $config['a'];
		}
	}
	/**
	 * 加载类库
	 * 会优先加载项目目录lib中的类
	 * @param str $lib 类名称
	 * @param str $dir like /Core/lib/
	 * @return obj
	 */
	protected function b($lib)
	{
		$systempath = CORE.'/lib/'.$lib.'.class.php';
		$apppath = APP.'/lib/'.$lib.'.class.php';
		//引入lib
		if(file_exists($apppath)) 
		{
			include_once $apppath;
		}
		else
		{
			if(file_exists($systempath))
			{
				include_once $systempath;
			}
			else 
			{
				show_error('库'.$lib.'不存在');
			}
		}
		$lib = new $lib();
		return $lib;//返回OBJ
	}
	/**
	 * 加载模型
	 * @param str $model 类名称
	 * @return obj
	 */
	protected function m($model)
	{
		$path = APP.'/m/'.$model.'.php';
		//include 模型
		if(!file_exists($path)) 
		{
			show_error('m'.$model.'不存在');
		}
		else
		{
			include_once $path;
		}
		$model = new $model();
		return $model;//返回OBJ
	}
	//渲染视图
	protected function display($tpl,$data = '')
	{
		if(empty($this->t))
		{
			$this->t = $this->b('T','/Core/lib/');
		}
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