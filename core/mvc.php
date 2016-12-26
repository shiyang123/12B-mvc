<?php
namespace core;
class mvc
{
	public static $classMap =array();
	public $assign;
	static public function run()
	{

		$route = new \core\lib\route();

	 	$controllerClass = $route->controller;
	 	$action = $route->action;
	 	$controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';
	 	//var_dump($controllerFile);
	    $cltrlClass = '\\'.MODULE . '\controller\\'.$controllerClass.'Controller';
		
		if(is_file($controllerFile))
		{
			include $controllerFile;
			$controller = new $cltrlClass();
			//p($controller);
			$controller->$action();
		}else{
			throw new \Exception('找不到控制器'.$controllerClass);
		}
	}
	static public function load($class)
	{
		//自动加载类库
		//new\core\route();
		//$class = '\core\route';
		//MVC.'/core/route.php';
		// p($class);
		// p(MVC . $class . '.php');
		if(isset($classMap[$class])){
			return true;
		}
		else
		{
		$class = str_replace('\\', '/', $class);
		$file = MVC . '/' . $class . ".php";
			if(is_file($file))
			{
				include $file;
			}
			else
			{
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