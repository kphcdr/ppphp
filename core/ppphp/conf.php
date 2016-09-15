<?php
/* ========================================================================
 * 加载系统配置类,可以防止重复引入文件
 * ======================================================================== */
namespace ppphp;

class conf
{
    /**
     * 用来存储已经加载的配置
     *
     * @var array
     */
    static public $conf = array();
    
    /**
     * 加载系统配置文件,如果之前已经加载过,那么就直接返回所有配置或其中一个配置
     * @param string $file 文件名
     * @param string $name 配置名
     * @return mixed       找不到配置时返回false，当$name为空时返回文件所有配置，否则只返回$name这配置项
     */
    static public function get($file='conf', $name=null)
    {
        // 判断配置没有缓存的话就导入配置文件并缓存
        if (!isset(self::$conf[$file]))
            // 判断配置文件是否存在
            $conf = CORE.'config/' . $file . '.php';
            if (!is_file($conf)) {
                return false;
            }

            self::$conf[$file] = include $conf;
        }
        
        // 如果$name为null则返回所有的设置
        if (is_null($name)) {
            return self::$conf[$file];
        }
        
        // 判断配置项是否存在并返回
        return isset(self::$conf[$file][$name]) ? self::$conf[$file][$name] : false;
    }
