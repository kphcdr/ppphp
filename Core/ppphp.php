<?php
use PPPHP\log;
/* ========================================================================
 * 类自动加载,所有类都通过这一个类进行加载
 * ======================================================================== */
class ppphp {
    
    public static $classMap = array();
    
    public static function load($class) 
    {
        if(isset($classMap[$class])) {
            return true;
        } else {
            if(is_file(CORE.$class.'.php')) {
                include_once CORE.$class.'.php';
                self::$classMap[] = $class;
            }            
        }
    }
    
    public static function run()
    {
        $route = new \PPPHP\route();
        \PPPHP\log::init();
        \PPPHP\log::test();
        \PPPHP\conf::conf('name','config');
        \PPPHP\conf::conf('name','config');
        #\Psr\Log\LoggerInterface::error('test');
    }
}