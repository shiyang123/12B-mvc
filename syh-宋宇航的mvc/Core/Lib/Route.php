<?php 
namespace Core\Lib;
/**
* 路由类
*/
class Route
{
	public $controller;//控制器
	public $action;//方法
	function __construct()
	{
		if (isset($_SERVER['PATH_INFO']))
		{
			$path=$_SERVER['PATH_INFO'];
			$pathArr=explode('/',trim($path,"/"));
		}

		if (isset($path)&&!empty($pathArr[0]))
		{
			$this->controller=$pathArr[0];
			unset($pathArr[0]);
		}
		else
		{
			$this->controller=config::get('route','controller');
		}

		if (isset($path)&&!empty($pathArr[1]))
		{
			 $this->action=$pathArr[1];
			 unset($pathArr[1]);
		}
		else
		{
			$this->action=config::get('route','action');
		} 

		// 重新建立索引
		if (!empty($pathArr))
		{
			$pathArr=array_values($pathArr);
			$i=0;
			while (!empty($pathArr)&&$i<count($pathArr))
			{
				if(isset($pathArr[$i+1]))
				{
					$arr[$pathArr[$i]]=$pathArr[$i+1];	
				}
				$i+=2;
			}
			 
		}
		 
		 
	}
}


?>