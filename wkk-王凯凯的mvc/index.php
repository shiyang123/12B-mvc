<?php   
/*入口文件
*定义常量
*加载函数库
*启动框架
*/
define('FRAMEWORK',dirname(__FILE__));

define('CORE',FRAMEWORK.'/core');//主要核心文件
define('APP',FRAMEWORK.'/app');//控制器模型文件
define('MODULE','app');

define('DEBUG',true);//调试模式

if (DEBUG){
	ini_set('display_error','On');
} else {
	ini_set('display_error','Off');
}

include CORE.'/common/function.php';//加载文件
include CORE.'/framework.php';//核心文件
//判断
spl_autoload_register('\core\framework::load');
\core\framework::run();

?>