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
        echo 1;
        unset($argv[0]);
        $shellName = array_shift($argv);
        //加载脚本

        $shellFile = "common\\{$shellName}";
        $shell = new $shellFile($argv);
        $shell->start();
    }

}