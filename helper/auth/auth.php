<?php
/**
 * 用户登录注册权限验证类
 */
namespace helper\auth;

class auth
{
    public $tableName = 'admin';
    public $field = [
        'username'=>'name',//用户名
        'password'=>'password',//密码
        'state'=>'state'//是否可用 0可用1不可用
    ];
    public $message;
    public function __construct()
    {

    }

    public function isLogin()
    {

    }

    public function login($name,$password)
    {
        $model = new \ppphp\model();
        $ret = $model->get($this->tableName,'*',[
            $this->field['username']=>$name
        ]);
        //是否存在这个账号
        if(!$ret) {
            $this->message = '账号不存在';
            return false;
        }
        //检测账号是否可用
        if($ret[$this->field['state']] != 0) {
            $this->message = '这个账号已停用';
            return false;
        }
        //检测账号密码
        $password = md5(\ppphp\conf::conf('passwordkey','key').$password);
        if($ret[$this->field['password']] != $password) {
            $this->message = '密码错误';
            return false;
        } else {
            $this->message = '登录成功';
            return true;
        }


    }
}