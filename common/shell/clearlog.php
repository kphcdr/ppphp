<?php
namespace common\shell;

use common\baseCommon;

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
        p("清空log中");
        system("rm -rf ".PPPHP."/log/log/*");
        p("清空cache中");
        system("rm -rf ".PPPHP."/log/cache/*");
        p("清空twig_cache中");
        system("rm -rf ".PPPHP."/log/twig_cache/*");
        p("完事");
        $this->goodbye();
    }
}