<?php
if ( ! defined('PPPHP')) exit('非法入口');
class T 
{
	/**
	 * 模板赋值
	 * @param 变量名称 $name
	 * @param 变量值  $data
	 */
	public function assign($name,$data)
	{
		$this->$name = $data;
	}	
	
	/**
	 * 显示模板
	 * @param 模板路径 $tpl
	 */
	public function display($tpl)
	{
		if(!ini_get('short_open_tag'))
		{
			@ini_set('short_open_tag',1);
		}
		//查看模板是否存在
		if(file_exists($tpl))
		{
			//渲染变量，把变量转换为单个变量
			$data = get_object_vars($this);
			foreach($data as $key=>$value)
			{
				$name = $key;
				$$name = $value;
			} 
			unset($data);
			include $tpl;
		}
		else
		{
			show_error($tpl.'模板文件没有找到');
			return false;
		}
	}
}