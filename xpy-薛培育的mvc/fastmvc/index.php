<?php 
/**
 * 定义入口文件
 *1.定义常量
 *2.加载数据库
 *3.启动 
 */
header("content-type:text/html;charset=utf-8");
// 定义应用目录
//define('FASTMVC',dirname(__FILE__)); //__FILE__是把入口文件index.php也带上了
define("FASTMVC",realpath('./'));  //这样写也可以获取到路径
define('CORE',FASTMVC."/core");
define('APP',FASTMVC."/app");//项目文件
define('MODULE','app');
// 开启调试模式
define('DEBUG', TRUE);

if(DEBUG) {
    ini_set("display_error", 'On');
}else{
    ini_set("display_error", 'Off');
}
 include CORE.'/common/function.php';
 include CORE.'/run.php';
spl_autoload_register('\core\run::load');

\core\run::dump();


?>