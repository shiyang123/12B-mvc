<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/26
 * Time: 8:15
 * 日志类
 */
namespace core\lib;
class log{
    static $class;    //建一个属性去存放我们的类
    //1、确定日志存储方式
    //2、写日志
    //使用一个初始化的方法，去加载我们的存储方式
    static public function init(){
        //确定存储方式
        $drive = config::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;    //类名称
        self::$class = new $class;
        //p($class);
    }

    static public function log($name,$file='log'){
        self::$class->log($name,$file);
    }
}