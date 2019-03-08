<?php
namespace ppphp;
use ppphp\exception\ppphpException;
use Whoops\Exception\ErrorException;

/**
 * ppphp核心类
 *
 * @package ppphp
 *
 */
class ppphp
{
    /**
     * 框架启动方法,完成了两件事情
     * 1.加载route解析当前URL
     * 2.找到对应的控制以及方法,并运行
     */
    public static function run()
    {
        $request = new route();

        if(is_null($request->ctrl)) {
            show404();
        }
        $ctrlClass = $request->ctrl;
        $action    = $request->action;
        try {

            $ctrl = new $ctrlClass();

        } catch (\Exception $e) {

            if(DEBUG) {
                throw new ppphpException($ctrlClass . '是一个不存在的类');
            } else {
                show404();
            }

            return false;
        }
        $action = strtolower($request->method()) . ucfirst($action);

        if (method_exists($ctrl, $action)) {
            call_user_func([$ctrl, $action]);
        }
        else {
            if (DEBUG) {
                throw new ppphpException($action . '是一个不存在的方法');
            }
            else {
                show404();
            }
        }

    }

    /**
     *  初始化env环境
     */
    public static function development()
    {
        env::init();
    }

    /**
     *  初始化组件
     */
    public static function init()
    {
        session_start();
        //错误处理
        exceptionHandle::init();
        //日志
        log::init();

        //数据库
        model::init();
    }

}