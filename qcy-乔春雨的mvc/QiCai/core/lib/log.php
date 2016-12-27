<?php
namespace core\lib;//命名空间
class log
{
	static $class;//创建静态属性 存放类
	/**
	 *1、确定日志的存储方式
	 *2、写日志
	 */
	static public function init()
	{
		//确定存储方式
		$drive = conf::get('DRIVE','log');//加载驱动模型
		$class = '\core\lib\drive\log\\'.$drive;//拼接类的名称
		//在lib/log.php中加载
		self::$class = new $class;
	}
	//进行测试在基类imooc.php中启动
	//在日志类中（lib/log.php）创建静态方法调用驱动
	static public function log($name,$file = 'log')
	{
		self::$class->log($name,$file);
		//进行测试在基类imooc.php中启动
	}
	
}
?>