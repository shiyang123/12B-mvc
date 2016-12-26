<?php  
namespace core\lib;

class route
{
	public $controller;
    public $action;
    public function __construct(){
    	/**
    	 * 1、隐藏index.php
    	 * 2、获取URL 参数部分
    	 * 3、返回对应的控制器和方法
    	 */
    
   
        if(isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI']!="/"){
            //获取当前url    /index/index;
            $path = $_SERVER['REQUEST_URI'];
            //处理url
            $pathArray = explode('/',trim($path,'/'));
     
            if(isset($pathArray[0])){
                $this->controller = $pathArray[0];
                unset($pathArray[0]);   
            }
             
            if(isset($pathArray[1])){
                $this->action = $pathArray[1]; 
                unset($pathArray[1]);
            }else{
                //设置默认方法
                $this->action = "index";
            }
            //键名从2开始
            $count = count($pathArray) + 2;
            $i = 2;
            while($i < $count){
              //$i+1 是值的位置
              if(isset($pathArray[$i+1])){
                $_GET[$pathArray[$i]] = $pathArray[$i + 1];
              }
              $i = $i + 2;
            }

        }else{
            //设置默认
            $this->controller = "index";
            $this->action = "index";  
        }
    }   

}



?>