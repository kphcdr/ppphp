<?php
namespace common\shell;

use common\baseCommon;

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
        $this->welcome();
        $this->showCommon();
        sleep(1);
        $this->goodbye();


    }
}