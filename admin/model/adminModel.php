<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace admin\model;


class adminModel extends \ppphp\model
{
    public $table = 'admin';

    public function login()
    {
        $admin = trim(post('name'));
        $password = trim(post('password'));

        $ret = $this->get($this->table,'*',[
            'username'=>$admin
        ]);

        if(!$ret) {
            //不存在的用户
            return ['status'=>1,'message'=>'不存在的用户'];
        } else if($ret['is_use'] != 0){
            //账号不可用
            return ['status'=>2,'message'=>'账号不可用'];
        }

        $password = $this->_encodePassword($password);

        if($ret['password'] != $password) {
            return ['status'=>3,'message'=>'账号或者密码错误'];
        } else {
            //登录成功
            $session = new \ppphp\session();
            $session->set('id',$ret['id']);
            $session->set('username',$ret['username']);
            return ['status'=>0,'message'=>'登录成功'];
        }
    }

    private function  _encodePassword($password)
    {
        $password = md5($password);
        $password .= \ppphp\conf::conf('PASSWORDKEY','config');
        $password = md5($password);
        return $password;
    }

    public function loginout()
    {
        $session = new \ppphp\session();
        $session->dropall();
        $cookie = new \ppphp\cookie();
        $cookie->dropall();
    }

    public function adminList()
    {
        $data = $this->select($this->table,'*');

        return $data;
    }
}