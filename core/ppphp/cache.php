<?php
/* ========================================================================
 * 加载系统配置类,可以防止重复引入文件
 * ======================================================================== */
namespace ppphp;

abstract class cache
{
    static public $class;
    static public function init()
    {
        if(!self::$class) {

            $type = conf::get('CACHE_TYPE','cache');

            $class = '\\ppphp\\lib\\cache\\'.$type;
            self::$class = new $class();
        }
    }

    static public function get($name)
    {
        self::$class->get($name);
    }

    static public function set($name,$value,$time)
    {

    }

    static public function delete($name)
    {

    }
}