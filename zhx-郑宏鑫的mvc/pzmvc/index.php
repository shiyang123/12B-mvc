<?php
//获取框架目录 及名字
define('PZ',__DIR__);
//  核心文件
define('CORE',PZ.'/core');

//APP文件
define('APP',PZ.'/APP');

define('MODULE','app');
//是否开启bug调试功能
define('DEBUG',true);
//判断bug调试功能是否开启
if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

//加载文件
include CORE.'/common/function.php';
//核心文件
include CORE.'/pz.php';
//如果new的类不存在的时候
spl_autoload_register('\core\pz::load');
\core\pz::run();