<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/8
 * Time: 下午7:01
 */

namespace app\model;

use ppphp\cache;

class confModel extends \ppphp\model
{
    public $table = 'conf';
    public function getall()
    {
        $cache = new cache();
        $data = $cache->get('confList');
        if(!$data) {
            $ret = $this->select($this->table,'*');
            $data = array();
            foreach($ret as $a) {
                $data[$a['name']] = $a['value'];
            }
           $cache->set('confList',$data);
        }
        return $data;
    }
}