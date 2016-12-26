<?php
  /*
  *入口文件
  *1.定义常量
  *2.加载函数库
  *3.启动框架
  */
  header("content-type:text/html;charset=utf-8");

  //全局常量
  // define('MVC',dirname(__FILE__));//返回路径中的目录部分
  define('MVC',realpath('./'));
  // define('MVC',realpath(''));
  define('CORE',MVC.'/core');
  define('APP',MVC.'/app');

  define('MODULE','app');

  // 开启调试模式
  define('DEBUG',true);


  if(DEBUG){
    ini_set('display_error','On');
  }else{
    ini_set('display_error','Off');
  }
  // 然后在index.php入口文件加载我们的函数库。
  include CORE.'/common/function.php';
  // p(MVC);die;

  // 然后在core文件夹建文件imooc.php，并且在入口文件进行加载。加载函数库
  include CORE.'/imooc.php';
  // 当new一个类时，类不存在便加载这个方法。类自动加载
  spl_autoload_register('\core\imooc::load');

  \core\imooc::run();
