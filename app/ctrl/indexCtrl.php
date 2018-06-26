<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


use ppphp\model;
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

    }
}
