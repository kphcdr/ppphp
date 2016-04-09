<?php
//日志相关配置
return array(
    /**
     * file 存储
     */
    'CACHE_TYPE'=>'file',
    'OPTION'=> [
        'path'=>PPPHP.'/log/cahce',//储存位置
        'time'=>0,//超时时间
    ]
);