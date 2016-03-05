<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/6
 * Time: 上午1:06
 */

namespace admin\ctrl;


class base extends \ppphp
{
    public function __construct()
    {
        $sessinClass = new \ppphp\session();
        $this->id = $sessinClass->get('id');
        if(!$this->id) {
            redirect('/login');
        }
    }

}