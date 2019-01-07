<?php
namespace app\common\shell;

use app\common\baseCommon;
class help extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        $this->showCommon();
        $this->goodbye();
    }
}