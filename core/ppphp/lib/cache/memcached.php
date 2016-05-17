<?php
namespace ppphp\lib\cache;

use ppphp\conf;

class memcached extends \memcached
{
    private $time = 3600;  #存活时间
    public function __construct($option)
    {
        parent::__construct();
        $this->setOption(Memcached::OPT_COMPRESSION, false); //关闭压缩功能
        $this->setOption(Memcached::OPT_BINARY_PROTOCOL, true);//使用binary二进制协议
        $this->addServers($option['servers']);
    }

    public function set($name,$value,$time = false)
    {
        if(!$time) {
            $time = $this->time;
        }
        return parent::set($name,$value,$time);
    }

    public function del($name)
    {
        return parent::delete($name);
    }

    public function clear()
    {
        return parent::flush();
    }
}