<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2016/12/23
 * Time: 18:44
 */
namespace core;

class imooc
{
    public static $classMap = array();
    public $assign;

    //加载控制器
    static public function run()
    {
        //p('OK');
        $route = new \core\lib\route();
        $controllerClass = $route->controller;
        $action = $route->action;
        $controllerfile = 'app/controller/'.$controllerClass.'Controller.php';
        //p($controllerfile);exit();
        $controllerClass = '\\'.MODULE.'\controller\\'.$controllerClass.'Controller';
        if(is_file($controllerfile))
        {
            include $controllerfile;
            $controller = new $controllerClass();
            $controller -> $action();
        }else{
            throw new \Exception('找不到控制器'.$controllerClass);
        }
        //p($route);

    }

    //自动加载类
    static public function load($class)
    {
        //自动加载类库
        if(isset($classMap[$class]))
        {
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = IMOOC.'/'.$class.'.php';
            if(is_file($file))
            {
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    public function dispaly($file)
    {
        $file = 'app/views/'.$file;
        if(is_file($file))
        {
            extract($this->assign);
            include $file;
        }
    }

}