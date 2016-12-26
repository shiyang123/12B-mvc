<?php 
namespace Core\Lib;
/**
* 日志类
*/
class Log
{
	static $class;
	public static function init()
	{
		$drive=Config::get('log','drive');
		$class='\Core\Lib\Drive\Log\\'.$drive;
		self::$class=new $class;
	}
	public static function log($name,$file='log')
	{
		self::$class->log($name,$file);
	}
}

?>