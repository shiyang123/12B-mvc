<?php
namespace core\lib\drive\log;
use core\lib\conf;
class file
{
    public $path;//日志的存储位置
    public function __construct()
    {
        //初始化文件
        $conf = conf::get("OPTION","log");
        $this->path = $conf["PATH"];

    }
    //默认等于log
    public function log($message,$file = "log")
    {
        /**
         * 1.确定文件的存储位置是否存在如果不存在就创建一个
         * 2.写入日志
         */
        if(!is_dir($this->path.date("Ymd"))){
            //创建文件和文件权限
            mkdir($this->path.date("Ymd"),"777",true);
        }
        //写入日志拼接我们日志存放的位置
        return file_put_contents($this->path.date("Ymd")."/".$file.".php",date("Y-m-d H:i:s").json_encode($message).PHP_EOL,FILE_APPEND);
    }
}
