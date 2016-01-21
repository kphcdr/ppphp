<?php
namespace ppphp\lib\log;

use ppphp\conf;
class monolog
{
    public $class;
    public function __construct()
    {
        $this->class = new \Monolog\Logger(APP);
        $log_path = conf::conf('LOG_PATH','log').date('YmdH').'.log';
        $this->class->pushHandler(new \Monolog\Handler\StreamHandler($log_path));
    }
    
    public function __call($name,$args )
    {
        $this->class->$name($args[1]);
    }
    
    public function log($level,$message)
    {
        $this->class->log($level,json_encode($message));
    }
}