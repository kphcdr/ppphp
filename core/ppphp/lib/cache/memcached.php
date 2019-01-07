<?php
namespace ppphp\lib\cache;

class memcached
{
    private $time = 3600;  #存活时间
    private $mem;

    public function __construct($option)
    {
        $this->mem = new \Memcached();

        $this->mem->setOption(\Memcached::OPT_COMPRESSION, false); //关闭压缩功能
        $this->mem->setOption(\Memcached::OPT_BINARY_PROTOCOL, true);//使用binary二进制协议
        $this->mem->addServers($option['servers']);
    }

    public function get($name)
    {
        return $this->mem->get($name);
    }

    public function set($name, $value, $time = NULL)
    {
        if (! $time) {
            $time = $this->time;
        }

        return $this->mem->set($name, $value, $time);
    }

    public function del($name)
    {
        return $this->mem->delete($name);
    }

    public function clear()
    {
        return $this->mem->flush();
    }
}
