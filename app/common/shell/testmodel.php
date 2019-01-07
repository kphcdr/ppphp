<?php
namespace app\common\shell;

use app\common\baseCommon;
use ppphp\model;
use think\Db;

class testmodel extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        $ret = Db::query("show databases;");

        dump($ret);

        $this->goodbye();
    }
}