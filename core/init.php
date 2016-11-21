<?php
session_start();
/* ========================================================================
 * 框架加载文件，用于引导框架启动
 * ======================================================================== */
define('TIME', $_SERVER['REQUEST_TIME']);
//加载公共函数库
include CORE . 'function/function.php';
//加载核心文件
include CORE . 'ppphp.php';
//注册自动加载
spl_autoload_register('ppphp::load');
//开始跑框架
\ppphp::run();