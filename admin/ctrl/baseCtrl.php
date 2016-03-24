<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/6
 * Time: 上午1:06
 */

namespace admin\ctrl;


class baseCtrl extends \ppphp
{
    public function __construct()
    {
        //加载网站基本配置
        $this->webconf();
    }


    protected function webconf()
    {
        $confModel = new \admin\model\confModel();
        $data = $confModel->getall();
        $webconf = [];
        foreach($data as $a) {
            $webconf[$a['name']] = $a['value'];
        }
        $this->assign('CONF',$webconf);
    }



}