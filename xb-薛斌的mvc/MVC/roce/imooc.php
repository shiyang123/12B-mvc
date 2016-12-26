<?php 
namespace roce;
class imooc
{
	public static $classMap = array();
	public $assign;

	//加载控制器
	static public function run()
	{
		//new路由
		$route = new \roce\lib\route();
		//$ctrlClass控制器
		$ctrlClass = $route->ctrl;
		//$action方法
		$action = $route->action;

		//获取控制器地址
		$ctrlFile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
 
		//判断控制器文件是否存在
		if (is_file($ctrlFile))
		{
			include $ctrlFile;
			$obj = new $ctrlClass();
			$obj->index();
		}
		else
		{
			// echo $ctrlClass;
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
	}
	
	//自动加载类
	static public function load($class)
	{

		// //自动加载类库 
		$class = str_replace('\\','/',$class);
		$file = IMOOC.'/'.$class.'.php';
		//防止重复加载
		if (isset($classMap[$class])) 
		{
			return true;
		}
		else
		{
			//判断是否存在文件类
			if (is_file($file))
			{
				include $file;
				self::$classMap[$class] = $class;
			}
			else
			{
				return false;
			}
		}
	}

	//视图调用
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}

	public function display($file)
	{
		$file = APP.'/views/'.$file;
		if (is_file($file)) 
		{	
			extract($this->assign);
			include $file;
		}

	}


}



?>