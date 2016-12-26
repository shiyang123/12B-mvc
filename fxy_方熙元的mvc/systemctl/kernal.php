<?php

namespace systemctl;

class kernal
{
    public static $classMap = array();



    static function run ()
    {

        $route = new \systemctl\lib\routes();
        p($route);
    }


    static function load ($class)
    {

        //自动加载类库
        //new /systemctl/route();正常情况需要这样引入   因为这个类还没有引入  所以会触发入口文件中的自动引入方法
        //$class = '\systemctl\route.php';
        //转化成 kernal.'/systemctl/route.php';

        if(isset($classMap[$class])){
            //如果已存在该文件 那么直接调用
            return true;
        }else{
            //如果没有   那么出发入口文件自动引入
            $class = str_replace('\\','/',$class);   //替换目录符号  单独的'\'视为转义  所以用两个
            $file = SRion.'/'.$class.'.php';
            if(is_file($file)){
                //引入 路由文件
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }
}