<?php
/**
 * 示例控制器
 */
namespace app\ctrl;


class indexCtrl extends \ppphp
{
    public function index()
    {
        $this->display('index/index.html');
    }
}