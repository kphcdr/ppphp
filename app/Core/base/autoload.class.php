<?php
/**
 * 类自动装载
 * http://raremvc.googlecode.com
 * http://rare.hongtao3.com
 * @example
 * include 'rareAutoLoad.php';
 * $option=array('dirs'=>'/www/lib/share/,/www/lib/api/',//class 从那些目录中查找
 *               'cache'=>'/tmp/111111.php',//class path 缓存文件
 *               ‘suffix’=>'.class.php'   //需要类自动装载的php类文件的后缀
 *                "hand"=>false,   //是否手动更新class 路径文件 ，为false 时 缓存文件写入到指定的cache文件中去，
 *                                      //为true 是需要手动允许 autoLoad.php 文件
 *               );
 * rareAutoLoad::register($option);
 *
 * 参考了symfony 的类自动装载
 * 为了提供效率，将类的位置保存到缓存文件中，在第一次使用的时候会对dirs中的文件目录进行扫描
 * 需要自动装载的类的文件命名 要求 必须 以  .class.php 结束，如文件名为  a.class.php 中定义的类可以被扫描到而 a.php的文件会忽略掉
 * 类名 和 文件命名 可以没有关系  如 a.class.php 文件中 可以定义 class b{}
 *
 * @author duwei<duv123@gmail.com>
 *
 */
 $option=array('dirs'=>APP.'/lib,'.APP.'/c,'.CORE.'/base',
             'cache'=>APP.'/tmp/tmp',//class path 缓存文件
             'suffix'=>'.class.php',//需要类自动装载的php类文件的后缀
              "hand"=>false//是否自动更新缓存文件
             );
rareAutoLoad::register($option);
class rareAutoLoad
{
    private static $instance=null;
    private static $registered=false;
     
    private $cacheFile=null;
    private $classes=array();//对应class 类名 和对应文件路径
    private $option;
     
    private $hand=false;//是否手动运行该脚本进行class路径扫描,
    
    private $reloadCount=0;//reload操作的次数
    /**
    * @param array $option 需要参数 dirs：扫描目录  cache：缓存文件
    */
    public function __construct($option){

        if(!isset($option['suffix'])) $option['suffix']=".class.php";//文件后缀
        $this->option=$option;
        if(!isset($option['cache'])){
            $trac=debug_backtrace(false);
            $calFile=$trac[2]['file'];
            $option['cache']="/tmp/rareautoLoad_".md5($calFile)."_".filemtime($calFile);
            @unlink($option['cache']);
        }
        if(isset($option['hand']))$this->hand=(boolean)$option['hand'];
        $this->cacheFile=$option['cache'].".php";
        $this->getClasses();
    }
     
    /**
     * 获取DAutoLoad 的单实例对象
     * @param array $option
     * @return DAutoLoad
     */
    private static function getInstance($option){
        if (!isset(self::$instance)){
            self::$instance = new rareAutoLoad($option);
        }
        return self::$instance;
    }

    /**
     * 注册自动装载
     * @param array $option   array('dirs'=>'/www/lib/share/,/www/lib/api/','cache'=>'/tmp/111111.php');
     * @throws Exception
     */
    public static function register($option) {
        if (self::$registered)return;
        // ini_set('unserialize_callback_func', 'spl_autoload_call');
        if (false === spl_autoload_register(array(self::getInstance($option), 'autoload'))){
            die(sprintf('Unable to register %s::autoload as an autoloading method.', get_class(self::getInstance())));
        }
        self::$registered = true;
    }

    /**
     * spl_autoload_call 调用 load class
     * 若缓存文件中的类的路径不正确，会尝试reload一次
     * 对reload后还不存在的类 缓存中记录其key，标记为 false,以避免缓存文件多次无效的更新
     * 对于使用 class_exists 进行判断时默认会进行autoload操作
     * @param $class
     * @return
     */
    public function autoload($class){
        if(class_exists($class, false) || interface_exists($class, false)) return true;
        if ($this->classes && isset($this->classes[$class]) ){
            $file=$this->classes[$class];
            if(!$file)return false;
            if(!file_exists($file) && !$this->hand){
                $this->reload();
                return $this->autoload($class);
            }
            require($file);
            return true;
        }{
           $this->reload();
           if(isset($this->classes[$class])){
                $file=$this->classes[$class];
                if(!$file)return false;
                require($file);
                return true;
           }else{
             $this->classes[$class]=false;
             $this->saveCache();
           }
        }
        return false;
    }
    /**
     * 获取类名列表
     * @return
     */
    private function getClasses(){
        if(file_exists($this->cacheFile)){
            $this->classes=require($this->cacheFile);
            if(is_array($this->classes))return true;
        }
        $this->classes=array();
        $this->reload();
    }

    /**
     * 重新扫描一次
     * 并将类名的位置信息保存到cache 中
     * @return
     */
    private function reload(){
        $this->reloadCount++;
        if($this->hand)return;
         $cachedir=dirname($this->cacheFile);
         $this->directory($cachedir);
         if(!is_writable($cachedir)) die('can not write cache!');
        
        settype($this->classes, 'array');
         
        $dirs=$this->option['dirs'];
        if(!is_array($dirs)) $dirs=explode(",", $dirs);
        
        $dirs=array_unique($dirs);
        foreach($dirs as $dir){
            if(!$dir || !file_exists($dir))continue;
            $this->scanDir($dir);
        }
        $this->saveCache();
    }
    
    private function saveCache(){
        if($this->hand)return;
        $phpData="<?php\n/**\n*此文件为文件自动加载的缓存文件\n* ".date('Y-m-d H:i:s')."\n*/\n";
        if(!is_array($this->classes))$this->classes=array();
        ksort($this->classes);
        $phpData.="return ".var_export($this->classes,true).";";
        file_put_contents($this->cacheFile, $phpData,LOCK_EX);
        clearstatcache();
    }

    /**
     * 扫描文件夹以及文件
     * 只有 $this->option['suffix'] 命名的文件才会被扫描到
     * @param $dir
     * @return
     */
    private function scanDir($dir){
        $files=scandir($dir,1);
        foreach($files as $fileName){
            $file=rtrim($dir,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$fileName;
            if(is_dir($file) && strpos($fileName,'.')!==0){
                $this->scanDir($file);
            }else{
                if($this->str_endWith($fileName,$this->option['suffix'])){
                    preg_match_all('~^\s*(?:abstract\s+|final\s+)?(?:class|interface)\s+(\w+)~mi', file_get_contents($file), $classes);
                    foreach ($classes[1] as $class){
                        $this->classes[$class] = $file;
                       }
                }
            }
        }
    }
    
   private function directory($dir){
        return is_dir($dir) or ($this->directory(dirname($dir)) and mkdir($dir, 0777));
    }
    
    function str_endWith($str,$subStr){
        return substr($str, -(strlen($subStr)))==$subStr;
    }
}
