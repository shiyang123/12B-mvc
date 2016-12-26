<?php 
//路由的配置
namespace core\lib;
use core\lib\conf;
class route 
{
	public $ctrl;
	public $action;
	public function __construct()
	{
		//xxx.com/index.php/index/index
		/*
		*隐藏index.php
		*获取URL 参数部分
		*返回对应控制器和方法	
		 */
		//判断是否 Index
		//var_dump($_SERVER);
		//var_dump($_SERVER);
		if(isset($_SERVER['PATH_INFO'])){
			$path = $_SERVER['PATH_INFO'];
			//var_dump($path);
			$patharr = explode('/',trim($path,'/'));
			//var_dump($patharr);
			if(!empty($patharr[0])){
				$this->ctrl = $patharr[0];
				unset($patharr[0]);
			} else {
				$this->ctrl = conf::get('ACTION','route');
			}
			if(!empty($patharr[1])){
				$this->action = $patharr[1];
				unset($patharr[1]);
			} else {
				$this->action = conf::get('ACTION','route');
			}
			//url多余部分转换成 GET
			//index、index/id/1
			$count = count($patharr) + 2;
			$i = 0;
			while($i < $count){
				if(isset($patharr[$i + 1])){
					$_GET[$patharr[$i]] = $patharr[$i + 1];
				}
				$i = $i + 2;
			}

		} else {
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
		
		
	} 
}






?>