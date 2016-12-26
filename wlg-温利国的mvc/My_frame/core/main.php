<?php
namespace core;
class core
{
	public static $classMap = array();
    /**
     * 启动框架
     */
    static public function run()
    { 
        $route =  new \core\lib\route();
        $controllerClass = $route->controller;
        $action = $route->action;
        $controllerFile = APP.'/Controller/'.$controllerClass.'Controller.php';
        $controllerClass = '\\'.MODULE.'\Controller\\'.$controllerClass.'Controller';
        if (is_file($controllerFile)) {
            include $controllerFile;
            $controller = new $controllerClass();
            $controller->$action();
        } else {
            throw new \Exception("找不到控制器", $controllerClass);
            
        }
    }
    /**
     * 自动加载类库
     */
    static public function load($class)
    {
    	if (isset($classMap[$class])) {
    		return true;
    	} else {
    		$class = str_replace('\\', '/', $class);
    		$file = ROOT_PATH.'/'.$class.'.php';
    		if (is_file($file)) {
    			include $file;
    			self::$classMap[$class] = $class; 
    		} else {
    			return false;	
    		}
    	}
    }
    /**
     * 模板
     */
    public function view($file,$array)
    {
        $file = APP.'/View/'.$file;
        if (is_file($file)) {
            extract($array);
        }
        include $file;
    }
}
