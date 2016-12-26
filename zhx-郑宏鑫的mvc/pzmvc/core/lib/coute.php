<?php
namespace core\lib;
use core\lib\cof;
class coute{
    public $ctrl;
    public $action;
 public function __construct(){
    if($_SERVER['REQUEST_URI']&& $_SERVER['REQUEST_URI']!='/'){
        $path=$_SERVER['REQUEST_URI'];
       $patharr= explode('/',trim($path,'/'));
       if(isset($patharr[6])){
        if(!is_numeric($patharr[6])){
            for($i=0;$i<=5;$i++){
                unset($patharr[$i]);
            }
            $ctrl=$patharr[6];
            $action=$patharr[7];
            unset($patharr[6]);
            unset($patharr[4]);
            unset($patharr[5]);
            unset($patharr[7]);
            $this->ctrl=$ctrl;
            $this->action=$action;

        }else{
        unset($patharr[0]);
        unset($patharr[1]);
        unset($patharr[2]);
       if(isset($patharr[3])){
            $this->ctrl=$patharr[3];
       }else{
           $this->ctrl=conf::get('CTRL','route');
       }
        unset($patharr[3]);
        if(isset($patharr[4])){
            $this->action=$patharr[4];
        }else{
            $this->action=connf::get('ACTION','route');
        }
        unset($patharr[4]);
        //将URL多余部分转化成GET参数
        $count=count($patharr)+5;
        $i=0+5;
        while($i<$count){
            if(isset($patharr[$i+1])) {
                $_GET[$patharr[$i]] = $patharr[$i + 1];
            }
                $i=$i+2;
        }
    }
    }else{
      unset($patharr[0]);
        unset($patharr[1]);
        unset($patharr[2]);
       if(isset($patharr[3])){
            $this->ctrl=$patharr[3];
       }else{
           $this->ctrl=conf::get('CTRL','route');
       }
        unset($patharr[3]);
        if(isset($patharr[4])){
            $this->action=$patharr[4];
        }else{
            $this->action=conf::get('ACTION','route');
        }
        unset($patharr[4]);
        //将URL多余部分转化成GET参数
        $count=count($patharr)+5;
        $i=0+5;
        while($i<$count){
            if(isset($patharr[$i+1])) {
                $_GET[$patharr[$i]] = $patharr[$i + 1];
            }
                $i=$i+2;
        }   
    }
     }else{
        //控制器
        $this->ctrl=conf::get('CTRL','route');
        //方法
        $this->action=conf::get('ACTION','route');
        }
   
    
 }
}