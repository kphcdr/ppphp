<?php
if ( ! defined('PPPHP')) exit('非法入口');

class home extends ppphp 
{
    public function home()
    {

    }
    public function index()
    {
        $t = $this->b('T');
        $arg = $this->b('arg');
        $id = $arg->getarg(1);
        $m = $this->m('goods');
        $a = 'ss';
        $t->assign('a',$a);
        $t->display('index.tpl');
    }
}