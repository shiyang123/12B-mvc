<?php 

/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
header('content-type:text/html;charset=utf-8;');

//获取框架当前所在的目录
define('IMOOC',realpath('./'));

//设置一个核心文件
define('CORE',IMOOC.'/roce');

//设置一个项目文件
define('APP',IMOOC.'/app');

//定义一个模块
define('MODULE','app');
//设置一个调试模式
define('DEBUG',true);

//判断是否开启
if (DEBUG) 
{
	ini_set('display_error','On');
}
else
{
	ini_set('display_error','Off');
}


//加载函数库
include CORE."/imooc.php";

//调用自动加载;
spl_autoload_register('\roce\imooc::load');

//调用基础类run方法
\roce\imooc::run();

?>