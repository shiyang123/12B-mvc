<?php
//定义项目的根目录
define('ROOT_PATH',dirname(__FILE__));
//定义项目的核心目录
define('CORE',ROOT_PATH.'/core');
//定义项目目录
define('APP',ROOT_PATH.'/app');
//开启报错模式
define('DEBUG',true);
//定义模块
define('MODULE','app');
if (DEBUG) {
    ini_set('display_errors','On');
} else {
    ini_set('display_errors','Off');
}
//加载函数库
include CORE.'/common/function.php';
//加载框架核心
include CORE.'/main.php';
spl_autoload_register('\core\core::load');//类不存在触发
\core\core::run();