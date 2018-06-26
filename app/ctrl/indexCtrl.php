<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


use ppphp\view;
use think\Db;

class indexCtrl extends \ppphp
{
    use view;

    public function index()
    {
        $this->display('index/index.html');
    }

    public function test()
    {
        $ret = Db::query("show tables");

        dump($ret);
    }
}
