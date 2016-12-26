<?php
/*
入口文件
1、定义常量
2、加载函数库
3、启动框架
*/
//一、定义系统常量
define('JWW',realpath('/cms/jww'));    //当前框架所在的根目录
define('CORE',JWW.'/core');      //框架的核心文件
define('APP',JWW.'/app');      //项目文件所处的目录
define('MODULE','app');
//是否开启调错模式
define('DEBUG',true);
include "vendor/autoload.php";
if(DEBUG){
    $whoops = new \Whoops\Run;
    $errorTitle='框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}
//二、加载函数库
include CORE.'/common/function.php';
//加载核心文件
include CORE.'/ww.php';

spl_autoload_register('\core\ww::load');   //sql_autoload_register实例化类的时候，如果不存在，会触发这个方法
//通过spl_autoload_register这个方法，实现了类自动加载的功能
//三、启动框架
\core\ww::run();
//调用类基础类的run方法，在run方法中调用了我们的路由类，实现了解析url地址，找到了对应的控制器及方法，
//这样我们就可以在控制器中使用我们的模型类链接数据库，还可以在控制器中为视图文件赋值，以及代用我们的视图文件。
?>