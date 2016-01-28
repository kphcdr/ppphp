<?php
namespace ppphp;
class model extends \medoo
{
	protected $m;
	protected $database_type;
	protected $database_name;
	protected $server;
	protected $username;
	protected $password;
	
	public function __construct()
	{
		parent::__construct(conf::all('database'));
	}
}