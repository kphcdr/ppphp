<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace admin\model;


class articleModel extends \ppphp\model
{
    public $table = 'article';


    public function articleList()
    {
        $return =  $this->select($this->table,[
            '[>]'.$this->prefix.'category(c)'=>['c_id'=>'id']
        ],[
            'c.name(cname)','ppphp_article.id','ppphp_article.name'
        ]);
        p($return);
        p($this->last_query());
        p($this->error());
    }
}