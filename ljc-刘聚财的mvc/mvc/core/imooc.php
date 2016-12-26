<?php
namespace core;
class imooc
{
       public static $classMap = array();
       public $assign;
       static public function run()
        {
            \core\lib\log::init();
            $route = new \core\lib\route();
            $ctrlClass = $route->ctrl;//控制器
            $action = $route->artion;//方法
            $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';//获取控制器的路径
            $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';//获取类
           //判断这个类文件是否存在
            if(is_file($ctrlfile)){
                //如果类文件存在就new这个类 然后指向他的方法
                include $ctrlfile;
                $ctrl  = new $cltrlClass();
                $ctrl->$action();
                \core\lib\log::log("ctrl:".$ctrlClass."   "."action:".$action);//写入文件
            }else{
                //如果类文件不存在就返回
                throw new \Exception("找不到控制器".$ctrlClass);
            }
        }
        static public function load($class)
        {
            //自动加载类库
            //正常都是需要 new \core\route();
            //因为我们没有引入 所以需要引入一个参数 $class = '\core\route';
            //我们定义的是IMOOC.'/core/route.php';
            //所以我们需要我们引入的参数转换成我们定义的格式
            if(isset($classMap[$class])) {
                return true;
            }else{
                $class = str_replace("\\","/",$class);
                //判断文件是否存在
                $file = IMOOC."/".$class.".php";
                if(is_file($file)){
                    //如果这个是类是一个文件就引入进来
                    include $file;
                    self::$classMap[$class] = $class;
                }else{
                    //否则
                    return false;
                }
            }
        }
        public function assign($name,$value)
        {
            $this->assign[$name] = $value;//穿过的名字等于值
        }
        public function dispaly($file)
        {
            $file = APP."/views/".$file;
            //判断传过来的是不是一个文件
            if(is_file($file)){
                //提取assign里面的值
                extract($this->assign);
                include $file;
            }
        }
}