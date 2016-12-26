<?php 
namespace Core\Lib\Drive\Log;
use Core\Lib\Config;
/**
* 文件系统
*/
class File  
{
	public $path;//日志的存储位置
	public function __construct()
	{
		$this->path=Config::get('log','option')['path'];
		// var_dump($this->path);
	}
	public function log($message,$file='log')
	{
		if (!is_dir($this->path.date('Ymd')))
		{
			mkdir($this->path.date('Ymd'),'0777',TRUE);
		}
		// dd($this->path.date('Ymd'));
		return file_put_contents($this->path.date('Ymd').'/'.$file.'.php',date('Y-m-d H:i:s').' '.json_encode($message).PHP_EOL,FILE_APPEND);
	}
}
?>