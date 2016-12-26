<?php 
namespace core\lib\drive\log;
use core\lib\conf;

/**
 * 日志存储在文件
 */
class file
{	
	public $path; //日志存储路径
	public function __construct(){
		$conf = conf::get('log','OPTION');
		$this->path = $conf['PATH'];
	}

	public function log($message,$file = 'log'){
		if (!is_dir($this->path.date('YmdH'))) {
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		return file_put_contents($this->path.date('YmdH').'/'.'.php', json_encode($message).PHP_EOL,FILE_APPEND );
	}
}
?>
