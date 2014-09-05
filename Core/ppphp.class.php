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
			if(!isset($this->__a))
			{
				$c->index();
			}
			else
			{
			show_error('方法'.$this->__a.'不存在');
			}
		}
		else 
		{
			$a = $this->__a;
			$c->$a();
		}
		
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
	protected function b($lib,$array=NULL)
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
		if($array === NULL)
		{
			$lib = new $lib();
		}
		else
		{
			$lib = new $lib($array);
		}
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
			show_error('模型'.$model.'不存在');
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
		$data['__c'] = $this->__c;
		$data['__a'] = $this->__a;
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
	/**
	 * 获取GET的参数
	 */
	protected function get($str,$filter = '')
	{
		if(isset($_GET[$str]))
		{
			$return =  $_GET[$str];
		}
		else if(isset($this->pathinfo[$str]))
		{
			$return =  $this->pathinfo[$str];
		}
		if(isset($return))
		{
			switch ($filter)
			{
				case 'int':
					if (!is_numeric($return))
					{
						return FALSE;
					}
					break;
			}
			return $return;
		}
		else
		{
			return false;
		}
	}
	/**
	 * 获取POST参数
	 * @param str $name post名称 
	 * @param str $filter 过滤方式 int 
	 * @todo 更多的过滤方法
	 */
	public function post($name, $filter = '')
	{
		if (isset($_POST[$name]))
		{
			$param = $_POST[$name];
			switch ($filter)
			{
				case 'int':
					if (is_numeric($param))
					{
						$return = $param;
					}
					else
					{
						return FALSE;
					}
					break;
				
				default:
					$return = $param;
					break;
			}
			//是否开启魔术方法
			if($filter)
			{
				if (!get_magic_quotes_gpc())
				{
					$return = addslashes($return);
				}
			}
			return $return;
		}
		else
		{
			return FALSE;
		}
	}	
}