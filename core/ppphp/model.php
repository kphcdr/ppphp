<?php
/* ========================================================================
 * 模型基类,当前继承于medoo
 * 主要用于连接数据库,并封装了四个常用操作
 * ======================================================================== */
namespace ppphp;

use think\Db;

/**
 * Class model
 *
 * @package ppphp
 */
class model extends Db
{
    protected $db;

	public static function init()
	{
        Db::setConfig(conf::all("database"));
	}
}