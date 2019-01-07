<?php
/**
 * 框架的启动入口流程如下
 *
 * 1. 加载env环境配置
 * 2. 定义全局常量并加载函数库
 * 3. 框架初始化，包括session 错误处理 日志 数据库
 * 4. 启动框架
 */
define('TIME', $_SERVER['REQUEST_TIME']);
define('PPPHP_VERSION', '2.3.0');
define('PPPHP', realpath(__DIR__ . '/../'));    // 根目录

//env配置加载
\ppphp\ppphp::development();

//如果是多模块,可以通过动态设置module的形式,动态条用不同模块
$MODULE_NAME = 'app';
define('DEBUG', getenv("APP_DEBUG"));//调试模式
define('CORE', PPPHP . '/core/');
define('MODULE', $MODULE_NAME);
define('APP', PPPHP . '/' . MODULE . '/');

//加载函数库
include CORE . 'function/function.php';
//框架初始化
\ppphp\ppphp::init();

//启动
if (PHP_SAPI == 'cli') {
    \ppphp\ppphpCli::run();
}
else {
    \ppphp\ppphp::run();
}
