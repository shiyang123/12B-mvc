<?php

namespace core\lib;
use core\lib\conf;

class log
{
	/**
	 * 1.确定日志存储方式
	 * 2.写日志
	 */

	static $class;
	//日志
	static public function init(){
		$drive = conf::get('DRIVE','log');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}

	static public function log($name ,$file = 'log')          //调用该方法，在关键位置打上日志
	{
		self::$class->log($name ,$file);
	}
	// static public function mysql($name)
	// {
	// 	self::$class->log($name);
	// }



}