<?php
/* ========================================================================
 * PPPHP入口文件，用于定义常量
 * ======================================================================== */
//如果是多模块,可以通过动态设置module的形式,动态条用不同模块
if ($_SERVER['SERVER_NAME'] == 'ppphpadmin.m.com' || $_SERVER['SERVER_NAME'] == 'ppphpadmin.kphcdr.com') {
    $MODULE_NAME = 'admin';
} else {
    $MODULE_NAME = 'app';
}
define('DEBUG', true);//调试模式
define('PPPHP', realpath('./../'));    // 根目录
//系统路径
define('CORE', PPPHP . '/core/');
define('APP', PPPHP . '/' . $MODULE_NAME . '/');
define('MODULE', $MODULE_NAME);
date_default_timezone_set('Asia/Shanghai');
ini_set('date.timezone','Asia/Shanghai');
//载入composer
include PPPHP . '/vendor/autoload.php';
