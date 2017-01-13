<?php
namespace common;

use ppphp\log;
use ppphp\model;

class test
{
    public $param;
    public function __construct($param)
    {
        $this->param = $param;
        dump($param);
    }

    public function start()
    {
        $model = new model();

        $data = $model->select('article','*');
        dump($data);
        log::debug(json_encode($data));
    }
}