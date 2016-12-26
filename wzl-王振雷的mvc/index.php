<?php
/*
 * 入口文件
 * 定义常量
 * 加载函数
 * 启动框架
 */
//定义了全局的常量
define('MVC',realpath('./'));
//var_dump(MVC);
define('CORE',MVC.'/core');
define('APP',MVC.'/app');
define('DEBUG',true);
define('MODULE','app');
if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
include CORE.'/common/function.php';//加载函数库
include CORE.'/framwork.php';
spl_autoload_register('\core\framwork::load');//类自动加载
\core\framwork::run();//调用方法