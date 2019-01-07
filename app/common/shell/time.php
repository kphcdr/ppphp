<?php
namespace app\common\shell;

use app\common\baseCommon;

class time extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        p(time());
        $this->goodbye();
    }
}