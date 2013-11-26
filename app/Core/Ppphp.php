<?php
if ( ! defined('PPPHP')) exit('非法入口');
require CORE.'/Function.php';
require CORE.'/Autoload.php';
$option=array('dirs'=>APP.'/lib',APP.'/c',
             'cache'=>APP.'/tmp/tmp.php',//class path 缓存文件
             'suffix'=>'.class.php'   //需要类自动装载的php类文件的后缀
              "hand"=>false,   //是否手动更新class 路径文件 ，为false 时 缓存文件写入到指定的cache文件中去，
                                    //为true 是需要手动允许 autoLoad.php 文件
             );
rareAutoLoad::register($option);			 
$test = new db();
$test->test();
