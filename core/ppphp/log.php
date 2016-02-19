<?php
namespace ppphp;

abstract class log
{
    static public $class;
    static public $logMessage;
    static public function init()
    {
        if(!self::$class) {
            $type = conf::conf('LOG_TYPE','log');
            $class = '\\ppphp\\lib\\log\\'.$type;
            self::$class = new $class();
        }
    }
    static public function debug($message)
    {
        self::init();
        self::$class->debug('DEBUG',$message);
    }
    
    static public function info($message)
    {
        self::init();
        self::$class->info('INFO',$message);
    }
    
    static public function notice($message)
    {
        self::init();
        self::$class->notice('NOTICE',$message);
    }
    
    static public function warning($message)
    {
        self::init();
        self::$class->warning('WARNING',$message);
    }
    
    static public function error($message)
    {
        self::init();
        self::$class->error('ERROR',$message);
    }
    
    static public function critical($message)
    {
        self::init();
        self::$class->critical('CRITICAL',$message);
    }
    
    static public function alert($message)
    {
        self::init();
        self::$class->alert('ALETR',$message);
    }
    
    static public function log($level,$message)
    {
        self::init();
        self::$class->log('INFO',$message);
    }
}