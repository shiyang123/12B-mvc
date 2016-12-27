<?php
namespace core\lib;
use core\lib\conf;
class route
{   
	public $controller;
	public $action;
	public function __construct()
	{
		/**
		 * 1.隐藏index.php
		 * 2.获取URL 参数部分
		 * 3.返回对应控制器和方法
		 */
	    // p($_SERVER);die;
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
				// index/index
				$path = $_SERVER['REQUEST_URI'];
				 $patharr = explode('/', trim($path,'/'));
				 //p($patharr);
				 if(isset($patharr[0])){
				 	unset($patharr[0]);
				 }
				if(isset($patharr[1])){
					$this->controller = $patharr[1];
				}
				unset($patharr[1]);
				if(isset($patharr[2])){
					$this->action = $patharr[2];
					unset($patharr[2]);
				}
				else
				{
					$this->action = conf::get('ACTION','route');
				}
				//p($patharr);
				//url 多余部分转化成 GET
				//id/1/str/2/test/3
				$count = count($patharr) + 3;
				$i = 3;
				while($i < $count){
					if(isset($patharr[$i + 1])){
						$_GET[$patharr[$i]] = $patharr[$i + 1];	
					}
					$i =$i + 2;
				}
				// p($_GET);
			}else{
				$this->controller = conf::get('CONTROLLER','route');
				$this->action = conf::get('ACTION','route');
			}
	
	}
}