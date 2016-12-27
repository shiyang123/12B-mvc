<?php

namespace core;                //类，建立命名空间

	class imooc
  {
      static public function run()
      {
           // p('ok');
        
           // \core\lib\log::log($_SERVER);
           // \core\lib\log::mysql('mysql');
           $route = new \core\lib\route();   //引入路由类来触发spl_autoload_register 使访问的地址为xxx.com.index/index
           // p($route);
           $ctrlClass = $route->ctrl;
           $action = $route->action;
           $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
           $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';                                                                    
           // p($ctrlfile);exit;
           if(is_file($ctrlfile)){
                include $ctrlfile;
                $ctrl=new $cltrlClass();
                $ctrl->$action();
                \core\lib\log::init();
                \core\lib\log::log('ctrl:'.$ctrlClass.'   '.'action:'.$action);
           }else{
               throw new \Exception('找不到控制器'.$ctrlClass);     //不存在抛出异常
           }
      }

	   
       

      public static $classMap=array();    //定义变量来存储这个类
      static public function load($class)
      {
        // p($class);             //  输出core\lib\route

        //自动加载类库
        //new \core\route();
        //$class = '\core\route'; 1
        //MVC.'/core/route.php'; 2  由1转换成项目目录2
          if(isset($classMap[$class])){          //判断是否有这个类，否则在进行自动加载这个类
                return true;
          }else{
                 $class=str_replace('\\', '/',$class);     //将\转成/ ,'\\',中两个是因为要进行转义
                 $file = MVC.'/'.$class.'.php';
                 // p($file);                                  //  D:/mvc/core/lib/route.php
                 if(is_file($file)){                          //有这个文件，引进来，没有return false

                       include $file;
                       self::$classMap[$class] = $class;      
                 }else{
                    return false;
                 }
           }
      }

      

      //赋值方法
      public $assign;
      public function assign($name,$value)
      {
           $this->assign[$name] = $value;
      }

      //显示方法
      public function display($file)
      {
          $file = APP.'/views/'.$file;
          // p($file);
          //p($this->assign);exit();
          if(is_file($file)){                                 //判断有无该文件
            // p($this->assign());exit();
                extract($this->assign);                       //打散键值，能够在页面显示值
                include $file;
          }

      }

   }
?>