<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace app\model;

class articleModel extends \ppphp\model
{
    public $table = 'article';
    public function lists()
    {
        $data = $this->select($this->table,['id','name']);
        return $data;
    }
}