<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


use ppphp\view;

class indexCtrl extends \ppphp
{
    use view;
    public function index()
    {
        $this->display('index/index.html');
    }
}