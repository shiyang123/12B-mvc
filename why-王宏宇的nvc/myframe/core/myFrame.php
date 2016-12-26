<?php 
namespace core;

/**
 * 核心基类
 */
class myFrame
{	
	public static $classMap = array();
	public $assign;
	static public function run(){
		\core\lib\log::init(); //加载核心日志类
		\core\lib\log::log(array('name'=>'zhangsan','age'=>14));
		$route = new  \core\lib\route(); //加载路由类
		$controller = $route->controller;
		$action = $route->action;
		$controlleFile = APP.'/controller/'.$controller.'Controller.php';
		$controllerClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
		if (is_file($controlleFile)) {
			include $controlleFile;
			$ctrl = new $controllerClass();
			$ctrl->$action() ;
			\core\lib\log::log('controller:'.$controllerClass.'.action'.$action);
		} else {
			throw new \Exception("找不到控制器".$controller);	
		}
	}

	/**
	 * 自动加在类库
	 */
	static public function load($class){
		if (isset($classMap[$class])) {
			return true;
		} else {
			$class = str_replace('\\', '/', $class);
			$file = MY_FRAME.'/'.$class.'.php';
			if (is_file($file)) {	
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
	}

	public function assign($name,$value){
		$this->assign[$name] = $value;
	}

	public function display($file){
		$file = APP.'/views/'.$file;
		if ($file) {
			extract($this->assign);
			include $file;
		}
	}
} 
 ?>