<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
header("content-type:text/html;charset=utf-8");
//根目录
define('IMOOC',realpath('./'));
//框架的核心文件目录
define('CORE',IMOOC.'/core');
//项目文件目录
define('APP',IMOOC.'/app');
define('MODULE','app');
//是否开启调试文件
define('DEBUG', true);

//引入compose的类
include "vendor/autoload.php";

if (DEBUG) {
	//第三方类库错误
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('dispaly_error', 'On');
} else {
	ini_set('dispaly_error', 'Off');
}

//调用输出方法“P”
include CORE.'/common/function.php';
//框架的核心文件
include CORE.'/imooc.php';

//自动加载类库（当new的类不存在时：自动加载这个类库）
spl_autoload_register('core\imooc::load');
\core\imooc::run();




