<?php
/*
*	中转入口
*
*	@author kphcdr <kphcdr.163.com>
*/
if ( ! defined('PPPHP')) exit('非法入口');

require CORE.'/ppphp.class.php';
//载入ppphp
require CORE.'/model.class.php';
$ppphp = new ppphp();
$ppphp->go();