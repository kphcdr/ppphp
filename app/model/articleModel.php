<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace app\model;

use ppphp\cache;

class articleModel extends \ppphp\model
{
    public $table = 'article';
    public function lists()
    {
        $cache = new cache();
        $data = $cache->get('articleList');
        if(!$data) {
            $data = $this->select($this->table, ['id', 'name'], [
                'is_use' => 0
            ]);
            $cache->set('articleList',$data);
        }
        return $data;
    }
}