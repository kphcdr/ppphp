<?php

/* ========================================================================
 * ppphp核心类
 * 实现以下几个功能
 * 类自动加载
 * 启动框架
 * 引入模型
 * 引入视图
 * ======================================================================== */

class ppphp_cli extends ppphp
{
    public static function run()
    {
        //加载日志模块
        \ppphp\log::init();
        $argv = $_SERVER['argv'];
        unset($argv[0]);
        $shellName = array_shift($argv);
        $shellName = empty($shellName) ? 'help' : $shellName;
        //加载脚本
        $shellFile = "common\\shell\\{$shellName}";
        $shell = new $shellFile($argv);
        $shell->start();
    }
}