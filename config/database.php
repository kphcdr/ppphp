<?php
//数据库相关配置
return [
    // 数据库类型
    'type'        => 'Mysql',
    // 服务器地址
    'hostname'    => getenv("DB_HOST"),
    // 数据库名
    'database'    => getenv("DB_NAME"),
    // 数据库用户名
    'username'    => getenv("DB_USERNAME"),
    // 数据库密码
    'password'    => getenv("DB_PASSWORD"),
    // 数据库连接端口
    'hostport'    => getenv("DB_PORT"),
    // 数据库连接参数
    'params'      => [],
    // 数据库编码默认采用utf8
    'charset'     => 'utf8',
    // 数据库表前缀
    'prefix'      => '',
];