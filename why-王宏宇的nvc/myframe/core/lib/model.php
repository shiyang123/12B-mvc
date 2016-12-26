<?php
namespace core\lib;
use core\lib\conf;

/**
 * 数据库连接类
 */
class model extends \PDO
{
	public function __construct(){
		$temp = conf::all('databases');
		$dsn = $temp['DSN'];
		$username = $temp['USERNAME'];
		$password = $temp['PASSWORD'];
		try {
			parent::__construct($dsn, $username, $password);
		} catch (\PDOException $e) {
			p($e->getMessage());
		}
	}
}
 ?>
