<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/26
 * Time: 8:21
 * 日志存储在文件系统中
 */
namespace core\lib\drive\log;
use core\lib\config;
class file{
    public $path;   //日志存储位置
    public function __construct(){
       $conf  = config::get('OPTION','log');
        $this->path = $conf['PATH'];
        //p($this->path);die;
    }
    public function log($message,$file='log'){
        //1、确定文件存储位置是否存在
        //   新建目录
        //2、写入日志
        //p($this->path);die;
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),'0777',true);
        }
        return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}