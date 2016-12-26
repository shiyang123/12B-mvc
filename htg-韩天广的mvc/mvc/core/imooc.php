<?php

namespace core;

class imooc{
	//启动框架
	static public function run(){
		// p('ok');die;
		\core\lib\log::init();
		\core\lib\log::log('test');
		$route = new \core\lib\route();
		// p($route);
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		
		//p($ctrlFile);exit;
		if(is_file($ctrlFile)){
			include $ctrlFile;
			$ctrl=new $cltrlClass();
			$ctrl->$action();
			\core\lib\log::log('ctrl:'.$ctrlClass.'    '.'action:'.$action);
		}else{
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
	}

	//自动加载类
	public static $classMap = array();
	static public function load($class){

		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\', '/',$class);
			$file = MVC.'/'.$class.'.php';
			//p($file);
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}

	//赋值方法
	public $assign;
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	//显示方法
	public function display($file)
	{
		$file = APP.'/views/'.$file;
		// p($file);
		//p($this->assign);exit();
		if(is_file($file)){
			extract($this->assign);  //从数组中将变量导入到当前的符号表
			include $file;
		}
	}


}

?>