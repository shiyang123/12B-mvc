<?php 
namespace core\lib\drive\log;
use core\lib\conf;
class file 
{
	public $path;
	public function __construct()
	{	
		$conf = conf::get('OPTION','log');
		//var_dump($conf);
		$this->path = $conf['PATH'];
	}
	public function log($message,$file = 'log')
	{

		/*
		确定文件的存储位置
		新建目录
		写入目录
		 */
		// echo $this->path;
		//var_dump($this->path);exit();
		if(!is_dir($this->path)) {
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		return file_put_contents($this->path.date('YmdH').'/'.'.php',PHP_EOL,FILE_APPEND );
	}
}

?>