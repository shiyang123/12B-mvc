<?php 
header("Content-type:text/html;charset=utf-8");
// 入口文件
// 1.定义常量
// 2.加载函数库
// 3.启动框架
// 网站根目录
define('ROOT',__DIR__);
define('APP',ROOT.'/App');
define('CORE',ROOT.'/Core');
define('DEBUG',TRUE);

include 'vendor/autoload.php';
if (DEBUG)
{
	$whoops = new \Whoops\Run;
	$errorTitle='框架出错了';
	$option=new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_errors','on');
}
else
{
	ini_set('display_errors','off');
}

include CORE.'/Common/function.php';
include CORE.'/System.php';
spl_autoload_register('\Core\System::load');
\Core\System::run();

?>