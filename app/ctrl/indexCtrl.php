<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


use ppphp\conf;
use ppphp\log;
use ppphp\ppphp;
use ppphp\view;
use think\Db;

class indexCtrl extends ppphp
{
    use view;

    public function index()
    {
        $this->display('index/index.html');
    }

    public function log()
    {
        $log = conf::all('route');
        log::error("error",$log);
    }

    public function getDb()
    {
        $ret = Db::query("show databases");
        dump($ret);
    }
}
