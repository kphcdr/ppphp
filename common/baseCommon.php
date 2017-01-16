<?php
namespace common;

class baseCommon
{
    public $commonList = [
        [
            'name' => 'help',
            'desc' => '展示所有可有的脚本'
        ],
        [
            'name' => 'test',
            'desc' => '测试脚本'
        ]
    ];
    private $startTime;
    private $endTime;

    public function __construct()
    {
        $this->setStartTime();
    }

    public function setStartTime()
    {
        $this->startTime = microtime(true);
    }

    public function setEndTime()
    {
        $this->endTime = microtime(true);
    }

    public function getUseTime()
    {
        return round($this->endTime - $this->startTime, 4);
    }

    public function showCommon()
    {

        array_walk($this->commonList, function ($a) {
            echo PHP_EOL;
            echo "\033[37m命令: \e[31mphp ppphp " . $a['name'] . "            \e[37m" . 'Desc:' . $a['desc'] . PHP_EOL;
        });
    }

    /**
     * 输出欢迎logo
     */
    public function welcome()
    {
        $str = "\e[36m====================================================" . "\e[36m" . PHP_EOL
            . "=                      PPPHP                       =" . PHP_EOL
            . "=                                                  =" . PHP_EOL
            . "=       PHP版本:" . PHP_VERSION . "   框架版本:" . PPPHP_VERSION . "            =" . PHP_EOL
            . "====================================================" . PHP_EOL;
        echo($str);
    }

    public function goodbye()
    {
        $this->setEndTime();

        $str = "\e[36m----------------------------------------------------" . PHP_EOL
            . "                  总用时 " . $this->getUseTime() . "              " . "\e[37m" . PHP_EOL;
        echo $str;
    }
}