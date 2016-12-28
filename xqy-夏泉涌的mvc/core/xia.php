<?php
namespace core;
class xia
{
	public static $classMap =array();
	public $assign;
	static public function run()
	{

		$route = new \core\lib\route();

	 	$controllerClass = $route->controller;		//将控制器放到变量挡住
	 	$action = $route->action;					//将方法也放到变量当中
	 	$controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';

	 	//var_dump($controllerFile);
	    $cltrlClass = '\\'.MODULE . '\controller\\'.$controllerClass.'Controller';
		//给/app命名一个常量
		if(is_file($controllerFile))		//判断该控制器是否存在
		{
			include $controllerFile;		//如果他存在就给他引入进来
			$controller = new $cltrlClass();
			//p($controller);
			$controller->$action();
		}else{								//跑出异常 
			throw new \Exception('找不到控制器'.$controllerClass);
		}
	}
	static public function load($class)
	{
		//自动加载类库
		//new\core\route();
		//$class = '\core\route';
		//XIA.'/core/route.php';
		// p(XIA);
		// p(XIA . $class . '.php');
		if(isset($classMap[$class])){
			return true;
		}
		else
		{
		$class = str_replace('\\', '/', $class);
		$file = XIA . '/' . $class . ".php";
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
    	//我们接到两个值，第一个是变量在视图层中的名字，第二个则是该名下对应的值
    	$this->assign[$name] = $value;
    }
    public function display($file)
    {
    	$file = APP.'/views/'.$file;
    	if (is_file($file)) {
    		extract($this->assign);
    		include $file;
    	}
    }
}