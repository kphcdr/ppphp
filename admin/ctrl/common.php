<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/6
 * Time: 上午1:06
 */

namespace admin\ctrl;



class common extends \admin\ctrl\base
{
    public function __construct()
    {
        $sessinClass = new \ppphp\session();
        $this->id = $sessinClass->get('id');
        $this->username = $sessinClass->get('username');
        if(!$this->id) {
            redirect('/login');
        }
    }

    public function json($array)
    {
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($array));
    }

}