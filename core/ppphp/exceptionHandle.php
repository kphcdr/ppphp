<?php
namespace ppphp;

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;

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

            $cloner = new VarCloner();
            $fallbackDumper = \in_array(\PHP_SAPI, array('cli', 'phpdbg')) ? new CliDumper() : new HtmlDumper();
            $dumper = new ServerDumper('tcp://127.0.0.1:9912', $fallbackDumper, array(
                'cli' => new CliContextProvider(),
                'source' => new SourceContextProvider(),
            ));

            VarDumper::setHandler(function ($var) use ($cloner, $dumper) {
                $dumper->dump($cloner->cloneVar($var));
            });
        }
    }
}