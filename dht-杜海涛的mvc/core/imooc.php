<?php

namespace core;

class imooc
{
	public static $classMap = array();
	public $assign;
	//基类库
	static public function run()
	{
		//启动日志类
		\core\lib\log::init();
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;

		$action = $route->action;
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE .'\ctrl\\'.$ctrlClass.'Ctrl';
		if (is_file($ctrlFile)) {
			include $ctrlFile;
			$ctrl = new $cltrlClass();
			$ctrl->$action();
			\core\lib\log::log('ctrl:'.$ctrlClass.'     '.'action:'.$action);
		} else {
			throw new \Exception("找不到控制器".$ctrlFile);
		}
	}

	//自动加载
	static public function load($class)
	{
		//自动加载类库
		if (isset($classMap[$class])) {
			return true;
		} else {
			$class = str_replace('\\', '/',$class);
			$file = IMOOC.'/'.$class.'.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
	}

	//为视图文件赋值
	public function assign($name, $value)
	{
		$this->assign[$name] = $value;
	}

	//调用视图文件
	public function display($file)
	{
		$file = APP.'/views/'.$file;
		if (is_file($file)) {
			extract($this->assign);
			include $file;
		}
	}
} 
