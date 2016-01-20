<?php
namespace PPPHP;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class log
{
    static public $class;
    static public $logMessage;
    static public function init()
    {
        $type = '\Monolog\Logger';
        //初始化方法
        self::$class = new $type(APP);
        self::$class->pushHandler(new \Monolog\Handler\StreamHandler(APP.'.log'));
        //加载配置文件
        
        //引入对应方法
    }
    static function test()
    {
        self::$class->addWarning('Foo');
    }
}