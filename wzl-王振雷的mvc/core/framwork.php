<?php
    namespace core;
    class framwork{
        public static $classMap =array();
        public $assign;
       static public function run()
       {
           $route = new \core\lib\route();//调用路由类
         //  p($route);
           $ctrlClass = $route->ctrl;
           $action = $route->action;
           $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
           $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
           if(is_file($ctrlfile)){
               include $ctrlfile;
               $ctrl = new $cltrlClass();
               $ctrl->$action();
           }else{
               throw new \Exception('找不到控制器'.$ctrlClass);
           }
        }
        static public function load($class){
            //自动加载类库
            if(isset($classMap[$class])){
                return true;
            }else {
                $class=str_replace('\\','/',$class);
                $file=MVC.'/'.$class . '.php';
                if (is_file($file)) {
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
       //     p($file);exit;
//            $filepath=str_replace('\\','/',$file);
//            p($filepath);exit;
            if(is_file($file)){
               // p($this->assign);exit();
               extract($this->assign);
                include $file;
            }
        }
    }