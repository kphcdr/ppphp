<?php
/*
*	PPPHP配置文件
*
*	@author kphcdr <kphcdr.163.com>
*/


$PPPHP_CONF = conf('setting');

foreach($PPPHP_CONF as $key=>$conf)
{
	define($key,$conf);
}

echo TPL_NAME;
