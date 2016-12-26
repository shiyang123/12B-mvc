<?php 

namespace core\lib;

class model extends \PDO
{
	public function __construct()
	{
		// $dsn='mysql:host=127.0.0.1;dbname=dayi';
		// $username='root';
		// $passwd='root';
		$database = conf::all('database');
		// print_r($database);
		try{
			parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
		} catch(\PDOException $e) {

			p($e->getMessage());
		}

	}
}
