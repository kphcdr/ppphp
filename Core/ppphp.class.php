<?php
if ( ! defined('PPPHP')) exit('非法入口');
class ppphp  
{
    protected $__c;//默认控制器的名称
    protected $__a;//默认方法的名称
    protected $t; //模板obj
    public $pathinfo;
    public function __construct()
	{
		$this->__route();
	}
	//go!go!go!
	public function go()
	{
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
			show_error(''.$model.'不存在');
		}
		else
		{
			include_once $path;
		}
		$model = new $model();
		return $model;//返回OBJ
	}
	/**
	 * 渲染视图
	 * 按照控制器/模板文件名称
	 * @param str $tpl 模板名称
	 * @param arr&str $data 数据 
	 * @return obj
	 */
	protected function display($tpl,$data = '',$output=true)
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
		$tpl = VIEW.'/'.$this->__c.'/'.$tpl;
		$this->t->display($tpl.'.tpl');
	}
}