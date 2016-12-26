<?php 
namespace core;

class myFrame
{	
	public static $classMap = array();
	public $assign;
	static public function run(){
		$route = new  \core\lib\route();
		$controller = $route->controller;
		$action = $route->action;
		$controlleFile = APP.'/controller/'.$controller.'Controller.php';
		$controllerClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';
		if (is_file($controlleFile)) {
			include $controlleFile;
			$ctrl = new $controllerClass();
			$ctrl->$action();
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