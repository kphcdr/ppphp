<?php
/* ========================================================================
 * 日志类
 * 日志驱动和储存位置请查看config/log.php
 * 使用方法(全局中)
 * \ppphp\log::log('DEBUG','出现了一个BUG');
 * ======================================================================== */
namespace ppphp;


class log
{
    static public $class;
    static public $logMessage;

    static public function init()
    {
        if (! self::$class) {

            $type = conf::get('LOG_TYPE', 'log');

            $class       = '\\ppphp\\lib\\log\\' . $type;
            self::$class = new $class();

        }
    }

    static public function debug($message, $array = [])
    {
        self::$class->debug('DEBUG', $message, $array);
    }

    static public function info($message, $array = [])
    {
        self::$class->info('INFO', $message, $array);
    }

    static public function notice($message, $array = [])
    {
        self::$class->notice('NOTICE', $message, $array);
    }

    static public function warning($message, $array = [])
    {
        self::$class->warning('WARNING', $message, $array);
    }

    static public function error($message, $array = [])
    {
        self::$class->error('ERROR', $message, $array);
    }

    static public function critical($message, $array = [])
    {
        self::$class->critical('CRITICAL', $message, $array);
    }

    static public function alert($message, $array = [])
    {
        self::$class->alert('ALETR', $message, $array);
    }

    static public function addlog($level, $message, $array = [])
    {
        self::$class->log($level, $message, $array);
    }
}