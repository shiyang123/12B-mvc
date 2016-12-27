<?php 

namespace core\lib\drive\log;
use core\lib\conf;

class file
{    
  //把日志存入文件中
      public $path;                                        //日志存储位置
      public function __construct()
      {

         $conf = conf::get('OPTION','log');                //初始化加载
         $this->path = $conf['PATH'];
      }

      public function log($message,$file = 'log')
      {
        /**
         * 1.确定存储位置是否存在
         * 2. 写日志
         */
           // p($this->path);exit;
           if(!is_dir($this->path.date('YmdH'))){               //判断是否存在该路径  每小时产生日志文件

                 mkdir($this->path.date('YmdH'),'0777',true);   //没有则给权限777
                 // chmod($this->path.date('YmdH'),'0777',true); //没有则给权限777
           }       
           // p($message);
           // p($this->path.$file.'.php');                     
           return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);  
             //因为有时日志为数组压成json串   PHP_EOL 换行  FILE_APPEND 追加
           // return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',$message,FILE_APPEND);

      }



}

