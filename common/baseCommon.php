<?php
namespace common;

class baseCommon
{
    //所有的脚本可以在这里定义一份,方便翻阅
    public $commonList = [
        [
            'name' => 'help',
            'desc' => '展示所有可有的脚本',
            'param'=> '无'
        ],
        [
            'name' => 'clearlog',
            'desc' => '清除所有log和cache',
            'param'=> '无'
        ],
        [
            'name' => 'newctrl $ctrlname',
            'desc' => '展示所有可有的脚本',
            'param'=> '控制器名称'
        ],
        [
            'name' => 'testmodel',
            'desc' => '测试数据库脚本',
            'param'=> '无'
        ],
        [
            'name' => 'queue',
            'desc' => '模拟队列处理示例',
            'param'=> '无'
        ]
    ];

    private $startTime;
    private $endTime;

    public function __construct()
    {
        $this->setStartTime();
        $this->welcome();
    }

    public function setStartTime()
    {
        $this->startTime = microtime(true);
    }

    public function setEndTime()
    {
        $this->endTime = microtime(true);
    }

    //获取脚本运行时间
    public function getUseTime()
    {
        return round($this->endTime - $this->startTime, 4);
    }

    /**
     * 展示所有可用的操作
     */
    public function showCommon()
    {

        array_walk($this->commonList, function ($a) {
            echo PHP_EOL;
            echo "\033[37mcommon: \e[31mphp ppphp " . $a['name'] . " \e[37m" . 'Desc:' . $a['desc'] ." Param: ".$a['param'] .PHP_EOL;
        });
    }

    /**
     * 输出欢迎logo
     */
    public function welcome()
    {
        $str = "\e[36m====================================================" . "\e[36m" . PHP_EOL
            . "=                    PPPHP框架                     =" . PHP_EOL
            . "=                                                  =" . PHP_EOL
            . "=       PHP版本:" . PHP_VERSION . "   框架版本:" . PPPHP_VERSION . "            =" . PHP_EOL
            . "====================================================" . PHP_EOL;
        echo $str ;
    }

    /**
     * 友好的结束语句
     */
    public function goodbye()
    {
        $this->setEndTime();

        $str = "\e[36m----------------------------------------------------" . PHP_EOL
            . "                  总用时 " . $this->getUseTime() . "              " . "\e[37m" . PHP_EOL;
        echo $str;
    }
}