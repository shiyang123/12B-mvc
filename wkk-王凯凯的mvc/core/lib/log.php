<?php 
namespace core\lib;

class log
{
	static $class;
	/*
	确定日志存储的方式

	写日志
	 */
	
	static public function init()
	{
		//确定驱动
		$drive = conf::get('DRIVE','log');
		$class = '\core\lib\drive\log\\'.$drive;
		//echo $class;die;
		self::$class = new $class;
	}
	static public function log($name)
	{	
		//echo $name;die;
		self::$class->log($name);
	}
}
?>