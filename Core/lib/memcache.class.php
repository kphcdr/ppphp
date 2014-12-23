<?php
class memcache
{
    private $memcache;
    
    /** 
     * Memcache缓存-设置链接服务器 
     * @param  array $servers
     */
    public function add_server($servers = array('127.0.0.1', '11211'))
    {
        $this->memcache = new Memcache();
		$this->memcache->addServer($servers[0],$servers[1]);
    }
    /** 
     * Memcache缓存-设置缓存 
     * 设置缓存key，value和缓存时间 
     * @param  string $key   KEY值 
     * @param  string $value 值 
     * @param  string $time  缓存时间 
     */
    public function set_cache($key, $value, $time = 0)
    {
        return $this->memcache->set($key, $value, false, $time);
    }
    /** 
     * Memcache缓存-获取缓存 
     * 通过KEY获取缓存数据 
     * @param  string $key   KEY值 
     */
    public function get_cache($key)
    {
        return $this->memcache->get($key);
    }
    /** 
     * Memcache缓存-清除一个缓存 
     * 从memcache中删除一条缓存 
     * @param  string $key   KEY值 
     */
    public function clear($key)
    {
        return $this->memcache->delete($key);
    }
    /** 
     * Memcache缓存-清空所有缓存 
     * 不建议使用该功能 
      */
    public function clear_all()
    {
        return $this->memcache->flush();
    }
    /** 
     * 字段自增-用于记数 
     * @param string $key  KEY值 
     * @param int    $step 新增的step值 
     */
    public function increment($key, $step = 1)
    {
        return $this->memcache->increment($key, (int)$step);
    }
    /** 
     * 字段自减-用于记数 
     * @param string $key  KEY值 
     * @param int    $step 新增的step值 
     */
    public function decrement($key, $step = 1)
    {
        return $this->memcache->decrement($key, (int) $step);
    }
    /** 
     * 关闭Memcache链接 
     */
    public function close()
    {
        return $this->memcache->close();
    }
    /** 
     * 替换数据 
     * @param string $key KEY值 
     * @param string $value 替换后的值 
     * @param int    $time  时间值 
     * @param bool   $flag  是否进行压缩 
     */
    public function replace($key, $value, $time = 0, $flag = false)
    {
        return $this->memcache->replace($key, $value, false, $time);
    }
    /** 
     * 获取Memcache的版本号 
     */
    public function getVersion()
    {
        return $this->memcache->getVersion();
    }
    /** 
     * 获取Memcache的状态数据 
     */
    public function getStats()
    {
        return $this->memcache->getStats();
    }
}