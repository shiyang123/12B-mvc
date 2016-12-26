<?php
/**入口文件
*  1.定义变量
*  2.加载函数库
*  3.启动框架
*/
// 1.入口文件

// 2.定义常量

// 3.引入函数库

// 4.自动加载类

// 5.启动框架

// 6.路由解析

// 7.加载控制器

// 8.返回结果
//一  定义常量
define('MVC',getcwd());	//当前框架的根目录	
define('CORE','MVC'.'/core');//框架核心文件夹
define('APP','MVC'.'/app');//项目文件
define('model', 'app');

//定义是否开启调错模式；
define('DEBUG',true);//是否开启调错模式 默认true

if(DEBUG)
{
	ini_set('display_error','On');
}
else
{
	ini_set('display_error','Off');
}

//加载函数库
include './core/common/function.php';


include './core/mvc.php';

spl_autoload_register('\core\mvc::load');//当没有类加载时加载此类

\core\mvc::run();

//日志类从入口执行
\core\lib\log::init();

\core\lib\log::log('Controller:'.$ControllerName.'       '.'Action:'.$ActionName);

