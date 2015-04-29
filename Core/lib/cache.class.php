<?php
/**
 *	PHP文本缓存缓存类
 *
 *
 */
class cache{

	private $dir = CACHE;	#缓存目录
	private $error; #错误内容

	/**
	 * 获取缓存
	 * @param str $filename 文件名称
	 * @return arr
	 */
	public function get($filename)
	{
		// 获取缓存数据
		$file = $this->dir.$filename.'.php';
	    if (is_file($file)) 
	    {
	        $return = include $file;
	        return $return;
	    } 
	    else 
	    {
	    	$this->error = '文件不存在';
	        return false;
	    }		
	}
	/**
	 * 设置缓存
	 * @param str $filename
	 * @param mix $data
	 * @return mix
	 */
	public function set($filename,$data)
	{
		
		$file = $this->dir.$filename.'.php';
	    $dir=dirname($filename);
	    if (!is_dir($dir))
	    {
	    	mkdir($dir,0755,true);
	    }
		
	    return file_put_contents($file, strip_whitespace("<?php\treturn " . var_export($data, true) . ";?>"));		
	}
	
	/**
	 * 删除单个缓存
	 * @param str $filename
	 * @return boolean
	 */
	public function del($filename)
	{
		$file = $this->dir.$filename.'.php';
		return unlink($file);
	}
	/**
	 * 清楚全部缓存
	 * @return boolean
	 */
	public function clear()
	{
		
		$file = glob($this->dir.'*');
		$result = array_map("unlink",$file);
		if($result !== false)
		{
			return true;
		}
		else
		{
			$this->error = '清除失败';
			return false;
		}
	}

	public function error()
	{
		return $this->error;
	}
}