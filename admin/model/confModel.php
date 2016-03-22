<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace admin\model;


class confModel extends \ppphp\model
{
    public $table = 'conf';
    public function getall()
    {
        return $this->select($this->table,'*');
    }
}