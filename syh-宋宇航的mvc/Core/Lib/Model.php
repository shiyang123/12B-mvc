<?php 
namespace Core\Lib;
/**
* 数据库类
*/
class Model extends \medoo
{
	public function __construct()
	{
		// $option=config::all('database');
		$dbConf=config::all('54database');
		parent::__construct($dbConf);
	}
}
?>