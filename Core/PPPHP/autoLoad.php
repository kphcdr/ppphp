<?php
namespace PPPHP;

class autoLoad {
    public static function import( $class ) 
    {
        p($class);
        //include CORE.$class.'.php';
    }
    
    public static function userimport($class)
    {
        p($class);
        p(APP.$class.'.php');
    }
} 
 
spl_autoload_register('\PPPHP\autoLoad::import');
spl_autoload_register('\PPPHP\autoLoad::userimport');