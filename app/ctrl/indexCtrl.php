<?php
/**
 * 示例控制器
 */
namespace app\ctrl;

use app\event\testEvent;
use ppphp\log;
use ppphp\ppphp;
use ppphp\view;
use think\Db;

class indexCtrl extends ppphp
{
    /**
     * 如果需要使用模板引擎，那么需要动态加载
     *
     * @var view
     */
    use view;

    public function index()
    {
        $this->assign("title","PPPHP");
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

    public function event()
    {
        $id = mt_rand(1,100);
        $data = [
          "name"=>"data",
            "server"=>$_SERVER
        ];
        $event = new testEvent($id,$data);
        $event->fire();
    }
}
