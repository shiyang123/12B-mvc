<?php 
namespace core\lib;
use core\lib\conf;

/**
 * 路由类
 */
class route
{	
	public $controller = '';
	public $action = '';
	public function __construct()
	{	
		if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
			$path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/',trim($path,'/'));
			if (isset($pathArr[0])) {
				$this->controller = $pathArr[0];
				unset($pathArr[0]);
			}
			if (isset($pathArr[1])) {
				$this->action = $pathArr[1];
				unset($pathArr[1]);
			} else {
				$this->action = conf::get('route','CONTROLLER');
			}
			$count = count($pathArr) + 2;
			$i = 2;
			while ($i < $count) {
				if (isset($pathArr[$i + 1])) {
					$_GET[$pathArr[$i]] = $pathArr[$i + 1];
					$i = $i + 2;
				}
			}
		} else {
			$this->controller = conf::get('route','CONTROLLER');
			$this->action = conf::get('route','ACTION');
		}
	}
}
 ?>