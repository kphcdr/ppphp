<?php
//数据库相关配置
return array(
	//mysql示例配置
	'database_type' => 'mysql',
	'database_name' => 'ppphp',
	'server' => '127.0.0.1',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	//medoo 对表前缀的支持有BUG,所以暂时不推荐设置表前缀
	'prefix' => '',
	//sqlite示例配置
//    'database_type' => 'sqlite',
//    'database_file' => 'db/ppphp.rdb'
);