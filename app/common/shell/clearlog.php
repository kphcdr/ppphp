<?php
namespace app\common\shell;

use app\common\baseCommon;

class clearlog extends baseCommon
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
        parent::__construct();
    }

    public function start()
    {
        fwrite(STDOUT, '这个命令将会清空log文件下的所有文件是否要执行(Y/N)?');
        $input = strtoupper(trim(fgets(STDIN)));
        if ($input == 'Y') {
            p("清空log中");
            system("rm -rf " . PPPHP . "/log/log/*");
            p("清空cache中");
            system("rm -rf " . PPPHP . "/log/cache/*");
            p("清空twig_cache中");
            system("rm -rf " . PPPHP . "/log/twig_cache/*");
            p("完事");
            $this->goodbye();
        } else {
            p('已经取消');
        }

    }
}