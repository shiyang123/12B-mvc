<?php 

namespace core\lib;
use core\lib\conf;
class model extends \medoo
{
	public function __construct()
	{
		// $dsn='mysql:host=127.0.0.1;dbname=dayi';
		// $username='root';
		// $passwd='root';
		$database = conf::all('database');
		parent::__construct($database);
		// print_r($database);
		// try{
		// 	parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
		// } catch(\PDOException $e) {

		// 	p($e->getMessage());
		// }

	}
}
