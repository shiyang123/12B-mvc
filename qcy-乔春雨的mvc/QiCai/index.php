<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
//定义网站根目录
define('IMOOC',__DIR__."\\");
// define('IMOOC',realpath('/'));
//核心文件位置
define('CORE',IMOOC.'core\\');
//项目文件
define('APP',IMOOC.'app\\');
define('MODULE','app');
//开启调试模式
define('DEBUG',TRUE);
//引入composer错误处理
include "vendor/autoload.php";

if(DEBUG){
	$whoops = new \Whoops\Run;
	$errorTitle = '框架出错了';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error','On');
}else{
	ini_set('display_error','Off');
}
// dump($_SERVER);
//加载函数库
include CORE.'common\function.php';
//加载核心文件
include CORE.'imooc.php';
spl_autoload_register('\core\imooc::load');//当new一个类的时候如果不存在会触发这个参数
\core\imooc::run();
