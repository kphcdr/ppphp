<?php
//日志相关配置
return array(

   /**
     * file 存储
     */

   'CACHE_TYPE'=>'file',
   'OPTION'=> [
       'path'=>PPPHP.'/log/cache',//储存位置
       'time'=>3600,//超时时间
   ]
       
//    'CACHE_TYPE'=>'memcached',
//    'OPTION'=> [
//        'servers'=>[
//            ['1161596bc6af4af2.m.cnqdalicm9pub001.ocs.aliyuncs.com
//','11211']
//        ]
//    ]
);