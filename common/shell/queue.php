<?php
namespace common\shell;

use common\baseCommon;
use ppphp\model;

class queue extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        p("队列开始...");
        $model = new model();
        while(true) {
            $data = $model->select('admin','*',[
                'is_use' => 0
            ]);

            dump($data);

            sleep(1);
        }
    }
}