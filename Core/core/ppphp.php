<?php
/*
*	中转入口
*
*	@author kphcdr <kphcdr.163.com>
*/
if ( ! defined('PPPHP')) exit('非法入口');
header("Content-type:text/html;charset=utf-8");
//是否开启错误提示以及BUG调试
if (DEBUG)
{
	error_reporting(E_ALL);
}
else
{
	error_reporting(0);
}
//单次请求的常量

define('TIME',time());


//全局配置文件
$CONFIG = require CORE.'/conf/setting.php';

//commnd
require CORE.'/common/common.php';

//载入ppphp
require CORE.'/core/conf.php';#配置文件处理
require CORE.'/core/ppphp.class.php';
require CORE.'/core/model.class.php';

$ppphp = new ppphp();
$ppphp->go();