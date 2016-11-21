<?php

/* ========================================================================
 * ppphp核心类
 * 实现以下几个功能
 * 类自动加载
 * 启动框架
 * 引入模型
 * 引入视图
 * ======================================================================== */

class ppphp
{
    /**
     * model用于存放已经加载的model模型,下次加载时直接返回
     */
    public $model;
    /**
     * 视图赋值
     */
    public $assign;


    /**
     * 自动加载类
     * @param $class 需要加载的类,需要带上命名空间
     */
    public static function load($class)
    {
        $class = str_replace('\\', '/', trim($class, '\\'));
        if (is_file(CORE . $class . '.php')) {
            include_once CORE . $class . '.php';
        } else {
            if (is_file(PPPHP . '/' . $class . '.php')) {
                include_once PPPHP . '/' . $class . '.php';
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
        $request = new \ppphp\route();
        \ppphp\log::init();
        $ctrlClass = '\\' . MODULE . '\ctrl\\' . $request->ctrl . 'Ctrl';
        $action = $request->action;
        $ctrlFile = APP . 'ctrl/' . $request->ctrl . 'Ctrl.php';

        if (is_file($ctrlFile)) {
            include $ctrlFile;
        } else {
            if (DEBUG) {
                throw new Exception($ctrlClass . '是一个不存在的控制器');
            } else {
                show404();
            }
        }
        $ctrl = new $ctrlClass();
        //如果开启restful,那么加载方法时带上请求类型
        if(\ppphp\conf::get('OPEN_RESTFUL','system')) {
            $action = strtolower($request->method()).ucfirst($action);
        }
        $ctrl->$action();
    }

}