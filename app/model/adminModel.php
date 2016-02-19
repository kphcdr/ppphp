<?php
//demo类，用于展示各种方法的使用方法
class adminModel extends \ppphp\model
{
	public $table = 'admin';

	public function login($name,$password)
    {
        $ret = $this->get($this->table,'*',[
            'AND'=>['name'=>$name,
            'password'=>$password,
            ]
        ]);
        if($ret) {
            return $ret;
        } else {
            return false;
        }
	}
}