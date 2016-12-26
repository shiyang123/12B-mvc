<?php
namespace core;
class pz
    {
    public static $calssMap=array();
    public $assign;
    static public function run(){

        $route=new \core\lib\coute();
        $ctrlClass=$route->ctrl;
        $action=$route->action;
        $ctrlfile=APP.'/ctrl/'.$ctrlClass.'Controller.php';
        $ctrlcalss='\\'.MODULE.'\ctrl\\'.$ctrlClass.'Controller';
        if(is_file($ctrlfile)){
             include $ctrlfile;
            $ctrl=new $ctrlcalss();
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }
    static public function load($class)
    {
        //自动加载类库
        if (isset($classMap[$class])) {
            return true;
        } else {
            $file=PZ .'/'. $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$calssMap[$class]=$class ;
            } else {
                return false;
            }
        }
    }
    public function assign($name,$value){
        $this->assign[$name]=$value;
    }
    public function display($files){
        $f=APP.'/views/'.$files;
        if(is_file($f)){
            if(isset($this->assign)){


            extract($this->assign);
            include $f;
            }else{
                include $f;
            }
        }
    }
}