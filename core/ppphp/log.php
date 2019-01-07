<?php
/* ========================================================================
 * 日志类
 * 日志驱动和储存位置请查看config/log.php
 * 使用方法(全局中)
 * \ppphp\log::log('DEBUG','出现了一个BUG');
 * ======================================================================== */
namespace ppphp;


use Monolog\Logger;

class log
{
    /**
     * @var Logger
     */
    static public $class;
    static public $logMessage;

    /**
     * 初始化
     */
    static public function init()
    {
        if (! self::$class) {

            $type = conf::get('LOG_TYPE', 'log');

            $class       = '\\ppphp\\lib\\log\\' . $type;
            self::$class = new $class();

        }
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function debug($message, $array = [])
    {
        return self::$class->debug('DEBUG', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function info($message, $array = [])
    {
        return self::$class->info('INFO', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function notice($message, $array = [])
    {
        self::$class->notice('NOTICE', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function warning($message, $array = [])
    {
        self::$class->warning('WARNING', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function error($message, $array = [])
    {
        self::$class->error('ERROR', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function critical($message, $array = [])
    {
        self::$class->critical('CRITICAL', $message, $array);
    }

    /**
     * @param       $message
     * @param array $array
     *
     * @return bool
     */
    static public function alert($message, $array = [])
    {
        self::$class->alert('ALETR', $message, $array);
    }

    /**
     * 普通的写日志
     *
     * @param       $level
     * @param       $message
     * @param array $array
     */
    static public function addLog($level, $message, $array = [])
    {
        self::$class->log($level, $message, $array);
    }
}