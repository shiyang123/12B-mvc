<?php
    /**
     * 1.入口文件
     * 2.定义常量
     * 3.加载函数库
     * 4.启动框架
     */
    header("content-type:text/html;charset=utf-8");

    define('MVC',realpath('./'));
    define('CORE',MVC.'/core');
    define('APP',MVC.'/app');

    define('MODULE','app');

    define('DEBUG',true);

    include "vendor/autoload.php";

    if(DEBUG){
        $whoops = new \Whoops\Run;
        $errorTitle = "框架出错了";
        $option = new \Whoops\Handler\PrettyPageHandler();
        $option->setPageTitle($errorTitle);
        $whoops->pushHandler($option);
        $whoops->register();

        ini_set('display_error','On');
    }else{
        ini_set('display_error','Off');
    }

    include CORE.'/common/function.php';

    include CORE.'/imooc.php';

    spl_autoload_register('\core\imooc::load');

    \core\imooc::run();
?>