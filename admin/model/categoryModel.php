<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace admin\model;


class categoryModel extends \ppphp\model
{
    public $table = 'category';


    public function categoryList()
    {
        return $this->select($this->table,'*');
    }
}