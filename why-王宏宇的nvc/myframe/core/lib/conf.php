<?php 
namespace core\lib;

/**
 * 配置类
 */
class conf
{	
	public static $conf = array();
	static public function get($file,$name){
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		} else {
			$file = MY_FRAME.'\core\conf\\'.$file.'.php';
			if (is_file($file)) {
				$conf = include $file;
				if(isset($conf[$name])) {
					self::$conf[$file] = $conf;
					return $conf[$name];
				} else {
					throw new \Exception('没有这个配置项'.$name);
				}
			} else {
				throw new \Exception("找不到配置文件".$file);	
			}
		}
	}

		static public function all($file){
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		} else {
			$file = MY_FRAME.'\core\conf\\'.$file.'.php';
			if (is_file($file)) {
				$conf = include $file;
				self::$conf[$file] = $conf;
				return $conf;
			} else {
				throw new \Exception("找不到配置文件".$file);	
			}
		}
	}
}
?>
