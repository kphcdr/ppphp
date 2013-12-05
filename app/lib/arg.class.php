<?php
if ( ! defined('PPPHP')) exit('非法入口');
/*
 *  ARG类
 *  用于获取URL中的参数
 * 
 * 
 */
class arg
{
    public function __construct()
    {
        
    }
    /*
     * 根据分段情况获取GET数据
     */
    public function getarg($int)
    {
        if(isset($_SERVER['PATH_INFO']))
        {
            $path = trim($_SERVER['PATH_INFO'], '/');
            $path = explode('/', $path);
        }
        if(!isset($path[$int]))
        {
            $path[$int] = 0;
        }
        return $path[$int];
    }
    /*
     * 获取POST数据
     */    
    public function post($value)
    {
        
    }
    /*
     * 获取server数据
     */    
    public function server($value)
    {
        
    }
		
}