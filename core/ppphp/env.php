<?php
/* ========================================================================
 * env 系统环境类
 * ======================================================================== */
namespace ppphp;


use Dotenv\Dotenv;

class env
{
    public static function init()
    {
        $dotenv = new Dotenv(PPPHP);
        $dotenv->load();
    }
}