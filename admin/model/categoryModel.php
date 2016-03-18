<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/14
 * Time: 下午5:54
 */

namespace admin\model;


class categoryModel extends \ppphp\model
{
    protected $table = 'category';

    public function all()
    {
        $data = $this->select($this->table,'*',[
            'ORDER'=>'sort DESC'
        ]);
        return $data;
    }
}