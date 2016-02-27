<?php
/* ========================================================================
 * ppphp核心类
 * 实现以下几个功能
 * 类自动加载
 * 启动框架
 * 引入模型
 * 引入视图
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

    /**
     * 框架启动方法,完成了两件事情
     * 1.加载route解析当前URL
     * 2.找到对应的控制以及方法,并运行
     */
    public static function run()
    {
        $requert = new \ppphp\route();
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$requert->ctrl;
        $action = $requert->action;
        $ctrl = new $ctrlClass();
        $ctrl->$action();
    }

    /**
     * 用于在控制器中加载模型
     */
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
            throw new Exception('找不到模型');
        }
    }

    /**
     * 用于在控制器中加载一个模板文件,并为
     */
    public function display($file)
    {
        $file = APP.'views/'.$file;
        if(file_exists($file)) {
            include $file;
        } else {
            throw new Exception($file.'模板文件不存在');
        }
    }
}