<?php
namespace ppphp;

class exceptionHandle
{
    public static function init()
    {
        if (DEBUG) {
            //打开PHP的错误显示
            ini_set('display_errors', true);
            //载入友好的错误显示类
            $whoops    = new \Whoops\Run;
            if(PHP_SAPI == 'cli') {
                $handler = new \Whoops\Handler\PlainTextHandler();
            } else {
                $handler = new \Whoops\Handler\PrettyPageHandler();
                $handler->setPageTitle("PPPHP出大事啦!!!");
            }
            $whoops->pushHandler($handler);
            $whoops->register();
        }
    }
}