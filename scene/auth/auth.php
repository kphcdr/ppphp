<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午4:00
 */

namespace scene\auth;


class auth
{
    public $name = 'name';
    public $password = 'password';
    public function __construct()
    {

    }

    public function isLogin()
    {
        $sessinClass = new \ppphp\session();
        $this->id = $sessinClass->get('id');
        if($this->id) {
            return $this->id;
        } else {
            return false;
        }
    }

    public function login()
    {

    }
}