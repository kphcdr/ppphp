<?php
/*
*	中转入口
*
*	@author kphcdr <kphcdr.163.com>
*/
if ( ! defined('PPPHP')) exit('非法入口');
//自动加载类
require CORE.'/ppphp.class.php';
//载入ppphp

$ppphp = new ppphp();
$ppphp->go();