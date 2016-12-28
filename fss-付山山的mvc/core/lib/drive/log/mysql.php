<?php 

namespace core\lib\drive\mysql;
use core\lib\conf;

class mysql
{    
  //把日志存入文件中
      public $path;
      public function __construct(){

         $conf = conf::get('OPTION','log');
          $this->path = $conf['PATH'];
      }

      public function log($name)
      {
           // p($name);exit;
           if(!is_dir($this->path)){

                 mkdir($this->path,'0777',true);
           }
           $message = date('Y-m-d H:i:s').$message;
           return file_put_contents($this->path.$file.'.php',json_encode($message));
      }



}