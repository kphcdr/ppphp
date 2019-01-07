<?php
namespace app\common\shell;

use app\common\baseCommon;
use ppphp\cliHelp;

class newctrl extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        if(isset($this->param[0])) {
            $fileName = $this->param[0];
            $filePath = PPPHP.'/'.MODULE.'/ctrl/'.$fileName .'.php';
            if(file_exists($filePath)) {
                throw New \Exception('已存在的控制器'.$fileName);
            } else {
                $cliHelp = new cliHelp();
                if(file_put_contents($filePath,$cliHelp->newCtrl($fileName))) {
                    p('创建成功');
                } else {
                    p('创建失败');
                }
            }
        } else {
            throw New \Exception('缺少参数');
        }
        $this->goodbye();
    }
}