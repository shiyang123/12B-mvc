<?php 
namespace core;
//封装类
class framework
{
	public static $classMap = array();
	//启动入口文件的方法
	public $assign;
	static public function run()
	{
		\core\lib\log::init();
		\core\lib\log::log($_SERVER,'server');
		$route = new \core\lib\route();
		//p($route);
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		// p($cltrlClass);
		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrl = new $cltrlClass();
			$ctrl->$action();
		} else {
			throw new \Exception('找不到控制器',$ctrlClass);
		}
	}
	static public function load($class)
	{
		//自动加载类库
		if(isset(self::$classMap[$class])){ 
			return true;
		} else {
			$class = str_replace('\\', '/', $class);
			$file = FRAMEWORK.'/'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}		
		}
		
	}

	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}
	public function display($file)
	{
		$file = APP.'/views/'.$file;
		if(is_file($file))
		{
			extract($this->assign);
			include $file;
		}
	}


}

?>