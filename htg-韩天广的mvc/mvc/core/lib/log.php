<?php 
namespace core\lib;
use core\lib\conf;
class log
{
	static $class;

	/**
	*1.确定日志储存方式
	*2.写日志
	*/
	static public function init()
	{
		$drive = conf::get('DRIVE','log');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}

	static public function log($name)
	{
		self::$class->log($name);
	}

}