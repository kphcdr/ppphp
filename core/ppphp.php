<?php
use PPPHP\log;
/* ========================================================================
 * 类自动加载,所有类都通过这一个类进行加载
 * ======================================================================== */
class ppphp {
    
    public static $classMap = array();
    public $requert;
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
        $requert = new \ppphp\route();
        p($requert);
        $ctrl = new $requert->ctrl;
    }
}