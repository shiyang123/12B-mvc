<?php
/*
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 * */

define('IMOOC',realpath('./'));  //当前框架所在的目录
define('CORE',IMOOC,'/core');  //框架核心文件所在的目录
define('APP',IMOOC,'/app');    //项目文件所在的目录
define('MODULE','app');

define('DEBUG',true);  //开启调试模式


if(DEBUG)
{
    //打开显示错误的开关
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include './core/common/function.php';   //加载函数库文件
//p(IMOOC);
include './core/imooc.php';   //加载框架的核心文件

//当我们new的类不存在的时候会触发“spl_autoload_register('imooc::load');”这个方法
spl_autoload_register('\core\imooc::load');
\core\imooc::run();
