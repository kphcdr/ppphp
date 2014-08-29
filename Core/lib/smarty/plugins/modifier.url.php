<?php
/*
*	Smarty 扩展函数
*	生成URL地址 
*	$url = "home/index" 生成index.php/home/index
*/
function smarty_modifier_url($url)
{
    //拼接URL
    $url = url($url);
    return $url;
}
