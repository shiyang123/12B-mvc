<?php
namespace core\lib;
use core\lib\conf;
class log
{
    //创建一个属性来存放我们的类
    static $class;
    /**
     * 1.先确定日志的存储方式
     * 2.写日志
     */
    //首先初始化一个方法
    static public function init(){
        //确定存储方式
        $drive = conf::get("DRIVE","log");
        $class = "\core\lib\drive\log\\".$drive;//来存放我们的类
        self::$class = new $class;
    }
    static public function log($name,$file = "log"){
        //日志存放的内容
        self::$class->log($name,$file);
    }
}