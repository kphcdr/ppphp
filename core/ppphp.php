<?php
use ppphp\log;
/* ========================================================================
 * 类自动加载,所有类都通过这一个类进行加载
 * ======================================================================== */
class ppphp {
    
    public static $classMap = array();
    public $model;
    public $requert;
    public static function load($class) 
    {
        if(isset($classMap[$class])) {
            return true;
        } else {
            if(is_file(CORE.$class.'.php')) {
                include_once CORE.$class.'.php';
                self::$classMap[] = $class;
            } else {
                if(is_file(PPPHP.'/'.$class.'.php')) {
                    include_once PPPHP.'/'.$class.'.php';
                    self::$classMap[] = $class;
                }
            }           
        }
    }
      
    public static function run()
    {
        $requert = new \ppphp\route();
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$requert->ctrl;
        $action = $requert->action;
        \ppphp\log::debug('message');
        $ctrl = new $ctrlClass();
        $ctrl->$action();
    }
    
    public function m($model)
    {
        $ModelFile = APP.'/model/'.$model.'.php';
        if(file_exists($ModelFile)) {
            if(isset($this->model[$model])) {
                return $this->model[$model];
            } else {
                include $ModelFile;
                $this->model[$model] = new $model();
                return $this->model[$model];//返回OBJ
            }
        } else {
            throw new ErrorException('找不到模型');
        }
    }
    
    public function display($file,$data=array())
    {
        $file = APP.'views/'.$file;
        if(file_exists($file)) {
            include $file;
        } else {
            throw new Exception($file.'模板文件不存在');
        }
    }
}