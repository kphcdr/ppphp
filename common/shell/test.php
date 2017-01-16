<?php
namespace common\shell;

use common\baseCommon;

class test extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        sleep(2);
    }
}