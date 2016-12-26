<?php 
namespace core\lib;
use core\lib\conf;

/**
 * 日志类
 */
class log
{
	static $class;
	public static function init(){
		$drive = conf::get('log','DRIVE');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}

	public static function log($name,$file = 'log'){
		self::$class->log($name,$file);
	}
}
?>
