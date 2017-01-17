<?php

/* ========================================================================
 * ppphp cli模式核心类
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
        try {
            if(file_exists(str_replace('\\', '/', trim(PPPHP.'/'.$shellFile.'.php', '\\')))) {
                $shell = new $shellFile($argv);
                $shell->start();
            } else {
                throw New Exception('不存在的脚本');
            }
        } catch (\Exception $e) {
            p($e->getMessage());
        }
    }
}