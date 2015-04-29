<?php
if ( ! defined('PPPHP')) exit('非法入口');
require CORE.'/lib/smarty/Smarty.class.php';
class t extends Smarty
{
        public function __construct() 
		{
			parent::__construct();
			$this->template_dir = VIEW; // 模版目录
			$this->compile_dir = APP.'/tmp'; //编译目录
			$this->cache_dir = APP.'/tmp'; //缓存目录
			$this->cache_lifetime = 1800; //缓存时间 
			$this->caching = FALSE; //缓存方式 
			$this->allow_php_templates = FALSE;//模板中使用[php]  
			$this->left_delimiter = '{'; //左定界符
			$this->right_delimiter = '}'; //右定界符
			$this->debugging = false;  //开启调试模式
			$this->debugging_ctrl = 'URL';
		}		
}