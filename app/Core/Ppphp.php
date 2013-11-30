<?php
if ( ! defined('PPPHP')) exit('非法入口');
//载入全局函数
require CORE.'/Function.php';
//自动加载类
require CORE.'/base/autoload.class.php';

//路由分派类


//缓存处理
//技术不够，将在2.0版本之后添加

$Route = new route();
$C = new controller();
$M = new model();
