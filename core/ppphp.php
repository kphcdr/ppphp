<?php
use ppphp\log;
/* ========================================================================
 * 类自动加载,所有类都通过这一个类进行加载
 * ======================================================================== */
class ppphp {
    /**
     * classMap用于存放已经加载过的类文件,下次加载的时候直接返回
     */
    public static $classMap = array();
    /**
     * model用于存放已经加载的model模型,下次加载时直接返回
     */
    public $model;

    /**
     * 自动加载类
     * 先判断类是否已经加载,如果加载过直接从classMap中返回,如果没有加载的话,先到CORE中查找,再在整个框架中进行查找
     * @param $class 需要加载的类,需要带上命名空间
     * @return object
     */
    public static function load($class)
    {
        if(isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\','/',trim($class,'\\'));
            if(is_file(CORE.$class.'.php')){
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