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
        $ret = $this->mem->addServers($option['servers']);
        if (! $ret) {
            \ppphp\log::alert($this->mem->getResultMessage());
        }
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
        $ret = $this->mem->set($name, $value, $time);
        if (! $ret) {
            \ppphp\log::alert($this->mem->getResultMessage());
        }

        return $ret;

    }

    public function del($name)
    {
        $ret = $this->mem->delete($name);
        if (! $ret) {
            \ppphp\log::alert($this->mem->getResultMessage());
        }

        return $ret;

    }

    public function clear()
    {
        $ret = $this->mem->flush();
        if (! $ret) {
            \ppphp\log::alert($this->mem->getResultMessage());
        }

        return $ret;
    }
}
