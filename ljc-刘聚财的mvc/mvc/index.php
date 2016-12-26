<?php
/**
 *入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
////UTF-8 header 头
//header("Content-type: text/html; charset=utf-8");
//获取入口文件的根目录
define("IMOOC",getcwd());
//框架核心的目录
define("CORE",IMOOC."/core");
//控制器、模型层、视图层所在的目录
define("APP",IMOOC."/app");
//把app单独定义一个变量
define("MODULE","app");
//是否开启调错模式
define("DEBUG",true);

//引入composer类
include "vendor/autoload.php";
//判断是否开启
if(DEBUG){
    //开启composer报错类
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set("display_error","On");
}else{
    //不开启
    ini_set("display_error","Off");
}
//加载函数库
include CORE."/common/function.php";
//加载核心文件
include CORE."/imooc.php";
//当类不存在会触发的方法
spl_autoload_register('\core\imooc::load');
\core\imooc::run();