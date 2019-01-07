<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


use app\common\shell\dumpServer;
use ppphp\cache;
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
        $this->assign("data",[
            "title"=>"PPPHP"
        ]);
        $this->display("index/index.html");
    }

    public function log()
    {

        log::debug("it is debug");
        log::error("it is error");
    }

    public function getDb()
    {
        $ret = Db::query("show databases");


        dump($ret);

    }
}
