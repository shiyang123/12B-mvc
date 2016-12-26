<?php
namespace Core\Lib;
/**
* 配置类
*/
class Config
{
	public static $config=[];
	//读取配置
	public static function get($file,$name)
	{
		if (isset(self::$config[$file][$name]))
		{
			return self::$config[$file][$name];
		}
		else
		{
			$path=CORE.'/Config/'.$file.'.php';
			if (is_file($path))
			{
				$config=include $path;
				if (isset($config[$name]))
				{
					self::$config[$file][$name]=$config[$name];
					return $config[$name];
				}
				else
				{
					throw new Exception('没有这个配置项'.$file);
				}
			}
			else
			{
				throw new Exception('找不到配置文件'.$file);
			}
			
		}
	}
	public static function all($file)
	{
		if (isset(self::$config[$file]))
		{
			return self::$config[$file];
		}
		else
		{
			$path=CORE.'/Config/'.$file.'.php';
			if (is_file($path))
			{
				$config=include $path;
				self::$config[$file]=$config;
				return $config;		 
			}
			else
			{
				throw new Exception('找不到配置文件'.$file);
			}
			
		}
	}
}


?>