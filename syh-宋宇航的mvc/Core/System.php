<?php 
namespace Core;
use Core\Lib\Log;
/**
* 系统核心类库
*/
class System  
{
	public $assign;
	public static $classMap=[];
 	public static function run()
 	{
 		Log::init();//加载日志
 		Log::log('test');
		$route=new \Core\Lib\Route();
		$class='\App\Controllers\\'.$route->controller;
		try {
			$controller=new $class();
			$controller->{$route->action}();	
			Log::log('controller:'.$class.'/'.'action:'.$route->action);
		} catch (Exception $e) { 
			echo '不存在该类'.$e->getMessage();
		} 

 	}
 	public static function load($class)
 	{

 	 	$class=str_replace('\\','/',$class);
 	 	if (isset(self::$classMap[$class]))
 	 	{
 	 		 return TRUE;
 	 	}
 	 	else
 	 	{
 	 		$path=ROOT.'/'.$class.'.php';
	 	 	if (is_file($path))
	 	 	{
	 	 		 include $path;
	 	 		 self::$classMap[$class]=$class;
	 	 	}
	 	 	else
	 	 	{
	 	 		return FALSE;
	 	 	}
 	 		
 	 	}
 	}
	public function assign($name,$value)
 	{
 		$this->assign[$name]=$value;
 	}
 	public function display($file)
 	{
 		$path=APP.'/Views/'.$file;
 		if (is_file($path))
 		{
			\Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/Views');
			$twig = new \Twig_Environment($loader,[
			'cache' =>CORE.'/Log/twig',
			'debug' =>DEBUG,
			]);
			$template=$twig->loadTemplate($file);
			$template->display($this->assign?$this->assign:'');
 		}
 	}
}

?>