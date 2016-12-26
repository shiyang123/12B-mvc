<?php
namespace core\lib;
class route
{
	public $controller;//控制器
	public $action;//方法
	public function __construct()
	{
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
			$path = $_SERVER['REQUEST_URI'];
			$patharray = explode('/',trim($path,'/'));
			if (isset($patharray[0])) {
				$this->controller = $patharray[0];
			}
			unset($patharray[0]);
			if (isset($patharray[1])) {
				$this->action = $patharray[1];
				unset($patharray[1]);
			} else {
				$this->action = 'index';
			}
			$count = count($patharray) + 2;
			$i = 2;
			while ($i < $count) {
				if (isset($patharray[$i + 1])) {
				$_GET[$patharray[$i]] = $patharray[$i + 1];
				}
				$i = $i + 2;
			}
		} else  {
			$this->controller = 'index';
			$this->action = 'index';
		}
		
	}
}