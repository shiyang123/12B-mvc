<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/24
 * Time: 11:00
 * 基础类
 */
namespace core;
class ww{
    public static $classMap = array();
    public $assign;
    static public function run(){
        //p('ok');
        \core\lib\log::init();
        \core\lib\log::log('test');
        \core\lib\log::log($_SERVER);
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/controller/'.$ctrlClass.'Controller.php';
        $cltrlClass = '\\'.MODULE.'\controller\\'.$ctrlClass.'Controller';
        //p($cltrlClass);die;
        if(is_file($ctrlfile)){
            include $ctrlfile;
            $ctrl = new $cltrlClass();
            $ctrl->$action();
            \core\lib\log::log('controller:'.$ctrlClass.'       '.'action:'.$action);
        }else{
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }
    static public function load($class){
        if(isset($classMap[$class])){
            return true;
        }
        //自动加载类库
        $class = str_replace('\\','/',$class);
        $file = JWW.'/'.$class.'.php';
        if(is_file($file)){    //判断文件是否存在
            include $file;
            self::$classMap[$class] = $class;
        }else{
            return false;
        }
    }

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }
    public function display($file){
        //将文件路径拼出来
        $file = APP.'/views/'.$file;
        //判断是不是文件，如果是文件就将文件引进来
        if(is_file($file)){
            //p($this->assign);exit();
            extract($this->assign);    //extract：从数组中将变量导入到当前的符号表
            include $file;
        }
    }
}