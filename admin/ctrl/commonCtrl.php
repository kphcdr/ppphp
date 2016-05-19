<?php
/**
 * Created by PhpStorm.
 * User: kphcdr
 * Date: 16/3/6
 * Time: 上午1:06
 */

namespace admin\ctrl;



class commonCtrl extends \admin\ctrl\baseCtrl
{
    public function __construct()
    {
        $sessinClass = new \ppphp\session();
        $this->id = $sessinClass->get('id');
        $this->username = $sessinClass->get('username');
        if(!$this->id) {
            redirect('/login');
        }
        $this->assign('username',$this->username);
        parent::__construct();
    }

    /**
     * 文字转拼音
     */
    public function toPinyin($str)
    {
        $pinyin = new \Overtrue\Pinyin\Pinyin();
        $ret = $pinyin->permlink($str,'-');
        return $ret;
    }
}