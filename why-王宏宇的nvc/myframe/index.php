<?php 
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('MY_FRAME',dirname(__FILE__)); //定义项目绝对路径
define('CORE',MY_FRAME.'/core'); //核心类路径
define('APP',MY_FRAME.'/app'); //项目路径
define('DEBUG',true); //是否开启调试
define('MODULE','app');

include "vendor/autoload.php";

if (DEBUG) {
	$whoops = new\Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error','on');
} else {
	ini_set('display_error','off');
}
include CORE.'/common/function.php';
include CORE.'/myFrame.php';
spl_autoload_register('\core\myFrame::load');
// \core\myFrame::run();
\core\tset::a();
?>

