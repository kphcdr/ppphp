<?php
namespace ppphp;

/* ========================================================================
 * ppphp核心类
 * 实现以下几个功能
 * 类自动加载
 * 启动框架
 * 引入模型
 * 引入视图
 * ======================================================================== */

use ppphp\exception\ppphpException;

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
     * 框架启动方法,完成了两件事情
     * 1.加载route解析当前URL
     * 2.找到对应的控制以及方法,并运行
     */
    public static function run()
    {
        $request = new route();

        $ctrlClass = '\\' . MODULE . '\ctrl\\' . $request->ctrl . 'Ctrl';
        $action = $request->action;
        $ctrlFile = APP . 'ctrl/' . $request->ctrl . 'Ctrl.php';
        if (is_file($ctrlFile)) {
            include $ctrlFile;
        } else {
            if (DEBUG) {
                throw new ppphpException($ctrlClass . '是一个不存在的控制器');
            } else {
                show404();
            }
        }
        $ctrl = new $ctrlClass();
        //如果开启restful,那么加载方法时带上请求类型
        if (conf::get('OPEN_RESTFUL', 'system')) {
            $action = strtolower($request->method()) . ucfirst($action);
        }

        if(method_exists($ctrl,$action)) {
            call_user_func([$ctrl,$action]);
        } else {
            if (DEBUG) {
                throw new ppphpException($ctrlClass . '是一个不存在的方法');
            } else {
                show404();
            }
        }

    }

    /**
     *  初始化环境
     */
    public static function development()
    {
        env::init();
    }

    public static function init()
    {
        //错误处理
        exceptionHandle::init();
        //日志
        log::init();

        //数据库
        model::init();
    }

}