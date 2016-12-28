<?php

namespace core\lib;
// use core\lib\conf;
class route
{
	  public $controller;
      public $action;
	public  function __construct()
	{
		// p('route ok');
		// p($_SERVER);
		// p($_SERVER['REQUEST_URI']);die();
		

		// xxx.com/index/index
        /**
         * 1.隐藏index.php
         * 2.获取url 参数部分
         * 3.返回对应的控制器和方法
         */
	        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
	        {
	            $path = $_SERVER['REQUEST_URI'];
	            // var_dump($path);die;  
	            $patharr = explode('/', trim($path, '/'));
	            if(isset($patharr[0])){
	                $this->controller = $patharr[0];
	                unset($patharr[0]);
	            }
	            if(isset($patharr[1])){
	                $this->action = $patharr[1];
	                unset($patharr[1]);
	            }else{
	                $this->action = 'index';
	            }

	            //url多余部分转化为GET参数
	            //a/1/b/2/c/3
	            $count = count($patharr) + 2;
	            $i = 2;
	            while ($i < $count) {
	                if(isset($patharr[$i + 1]))
	                {
	                    $_GET[$patharr[$i]] = $patharr[$i + 1];
	                }
	                $i += 2 ;
	            }
	        }
	        else
	        {
	            $this->controller = 'index';
	            $this->action = 'index';
	        }
	    }
	
}