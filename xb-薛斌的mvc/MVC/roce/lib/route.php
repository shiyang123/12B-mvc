<?php 
namespace roce\lib;
class route
{
	/**
	 * $ctrl 控制器
	 * $action 方法
	 * @var [type]
	 */
	public $ctrl;
	public $action;
	public function __construct()
	{
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!="/") 
		{
			//获取url路径
			$path = $_SERVER['REQUEST_URI'];
			//分开路径名称
			$arr = explode('/',trim($path,'/'));

			//判断控制器
			if (isset($arr[0])) 
			{
				$this->ctrl = $arr[0];
			}
			unset($arr[0]);

			//判断方法
			if (isset($arr[1])) 
			{	
				$this->action = $arr[1];
				unset($arr[1]);
			}
			else
			{
				$this->action = "index";
			}

			//url多余部分转成 Get
			//id/1/str/2/test/3
			$count = count($arr) + 2;
			for ($i=2; $i < $count; $i=$i+2) { 
				if (isset($arr[$i + 1]))
				{
					$_GET[$arr[$i]] = $arr[$i+1];
				}			 	
			}
		}
		else
		{
			$this->ctrl = "index";
			$this->action= "index";
		}
	}

}

?>