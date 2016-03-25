<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace admin\model;


use ppphp\conf;

class articleModel extends \ppphp\model
{
    public $table = 'article';


    public function articleListPage()
    {
        $page = get('p','int',1);
        $page = $page - 1;
        $pagenum = conf::get('ADMIN_PAGE','config');
        $limit = [$page*$pagenum,$pagenum];
        $limit = ['0'=>$page*$pagenum,'1'=>$pagenum];
        $return =  $this->select('article',[
            '[>]category(c)'=>['category'=>'id']
        ],[
            'c.name(cname)','article.id','article.name','article.is_use'
        ],[
            'LIMIT'=>$limit
        ]);
        p($this->last_query());
        return $return;
    }
}