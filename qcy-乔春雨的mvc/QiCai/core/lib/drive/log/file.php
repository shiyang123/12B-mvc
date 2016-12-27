<?php
namespace core\lib\drive\log;
use core\lib\conf;
class file
{
	public $path;//日志存储位置
	public function __construct()
	{
		//创建目录 写入配置文件
		$conf = conf::get('OPTION','log');
		$this->path = $conf['PATH'];
	}
	public function log($message,$file = 'log')
	{
		// p($message);//测试用
		/**
		 *1.确定文件存储位置是否存在
		 *  新建目录
		 *2.写入日志
		 */
		//判断路径是否存在 如果不存在直接创建
		if(!is_dir($this->path.date('YmdH'))){
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		// p($this->path.$file.'.php');
		//高并发时会有大量数据写入文件 给文件名称拼接一个日期 
		
		return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
	}
}
//文件系统
?>