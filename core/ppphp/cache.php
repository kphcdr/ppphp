<?php
/* ========================================================================
 * 缓存类
 * ======================================================================== */
namespace ppphp;


use ppphp\lib\cache\memcached;

class cache
{
    /**
     * @var memcached
     */
    private $class;

    public function __construct()
    {
        $type        = conf::get('CACHE_TYPE', 'cache');
        $option      = conf::get('OPTION', 'cache');
        $class       = '\\ppphp\\lib\\cache\\' . $type;
        $this->class = new $class($option);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->class->get($name);
    }

    /**
     * @param   string   $name
     * @param   mixed   $value
     * @param bool $time 如果为null，则使用默认设置
     *
     * @return mixed
     */
    public function set($name, $value, $time = null)
    {
        return $this->class->set($name, $value, $time);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function del($name)
    {
        return $this->class->del($name);
    }

    /**
     * @return bool
     */
    public function clear()
    {
        return $this->class->clear();
    }

}