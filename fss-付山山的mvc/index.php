<?php
   /*
	*入口文件
	*1.定义常量
	*2.加载函数库
	*3.启动框架
	*/
	define('MVC',str_replace('\\', '/' , __DIR__));          //获取当前框架所在目录,
	
	define('CORE',MVC.'/core');                              //核心文件
	define('APP',MVC.'/app');
	define('DEBUG',true);                                    //开启调试模式
	
	define('MODULE','app');
	
	if(DEBUG){
	   ini_set('display_error','On');
	}else{

	   ini_set('display_error','Off');
	}
	
	include CORE.'/common/function.php';                       //加载函数库
	// p(MVC);                                                    //输出当前脚本所在的绝对路径
	include CORE.'/imooc.php';                                 //核心文件
	spl_autoload_register('\core\imooc::load');        //new 一个 类的时候它不存在 就触发这个方法,实现类自动加载
	\core\imooc::run();                 //因为用的比较多，所以写成静态方法  ，调用run方法，来使用路由类   静态方式(用::操作符)调用的方法
    
?>