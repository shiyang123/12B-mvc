<?php

namespace core;

class mvc
{
	public static $classMap = array();
	public $assign;
	public function assign($name,$value)
	{
	    $this->assign[$name] = $value;
	}

	public function display($file)
	{
	    $file = './APP/views/' . $file;
	    if(is_file($file))
	    {
	        extract($this->assign);
	        include $file;
	    }
	}

static  public  function run()
	{
		// p('ok');
		$route = new \core\lib\route();
		$ControllerName = ucfirst($route->controller);
		// var_dump($ControllerName);die;
        $ActionName = $route->action;
        $ControllerFile =  './APP/controllers/' . $ControllerName . 'Controller.php';
        // var_dump($ControllerFile);die;
        $ControllerClass = '\\' . model .'\controllers\\' . $ControllerName . 'Controller';
         // var_dump($ControllerClass);die;
        if(is_file($ControllerFile)){
            include $ControllerFile;
            $controller = new $ControllerClass();

            $controller->$ActionName();
        }else{
             var_dump("Not  fountd".$ControllerName);    
        }
	}
	static public  function load($class)
	{
		//类的自动加载
		if(isset($classMap[$class]))
		{
			return true;
		}
		else
		{		
			$class=str_replace('\\', '/', $class);
			$file= MVC .'/'. $class . '.php';
			// p($file);
			if(is_file($file))
			{
				include $file;
				self::$classMap[$class]=$class;
			}
			else
			{
				return false;
			}
		}
	}
	
}