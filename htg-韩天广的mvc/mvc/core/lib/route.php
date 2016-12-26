<?php

namespace core\lib;
use \core\lib\conf;
class route
{
	public $ctrl;
	public $action;
	public function __construct()
	{
		//p($_SERVER);
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/MVC/'){
			$path = $_SERVER['REQUEST_URI'];
			$patharr = explode('/',trim($path,'/'));
			if(isset($patharr[0])){
				$this->ctrl = $patharr[0];
			}

			unset($patharr[0]);

			if(isset($patharr[1])){
				$this->action = $patharr[1];
				unset($patharr[1]);
			}/* else {
				$this->action=conf::get('ACTION','route');
			}*/

			// url多余部分转换成 GET
			// id/2/str/2/test/3
			$count = count($patharr)+2;
			$i = 2;
			while ( $i < $count) {
				if(isset($patharr[$i+1])){
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
				$i = $i + 2; 
			}
			//p($_GET);

		} else {
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
	}
}

?>