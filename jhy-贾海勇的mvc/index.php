<?php  
/**
 * 入口文件
 * 1、定义文件
 * 2、加载函数库
 * 3、启动框架
 */


//根目录
define('PATH',getcwd());
//核心文件
define('CORE',PATH.'/core');
//项目文件
define('APP',PATH.'/app');
//定义模块
define('MODULE','app');



//开启错误调试
define('DEBUG',true);

if(DEBUG){
	ini_set('display_error','On');
}else{
	ini_set('display_error','off');	
}


//加载类库
include CORE.'/common/function.php';

//核心文件
include CORE.'/run.php';

//自动加载类库
spl_autoload_register('\core\run::load');

//运行框架
\core\run::run();











?>