<?php
namespace ppphp\lib\log;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ppphp\conf;

class monolog
{
    public $class;

    public function __construct()
    {
        $this->class = new Logger(MODULE);
        $log_path    = conf::get('LOG_PATH', 'log') . date('Ymd') . '.log';

        $this->class->pushHandler(new StreamHandler($log_path));
    }

    public function __call($name, $args)
    {
        $this->class->$name($args[1], $args[2]);
    }

    public function log($level, $message, $content = [])
    {
        $this->class->log($level, $message, $content);
    }
}