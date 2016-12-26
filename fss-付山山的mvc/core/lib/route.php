<?php 

namespace core\lib;
use core\lib\conf;                                     //引入配置文件

    //路由文件
    class route
    {
           public $ctrl;                               //控制器
           public $action;                             //方法
           public function __construct()
           {
            // p('ol');
                //xxx.com/index/index
                //xxx.com/index.php/index/index
                /**
                 * 1.隐藏index.php
                 * 2.获取URL参数部分
                 * 3.返回对应控制器方法
                 */
                // p($_SERVER);
                if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
                    //  index/index
                	$path = $_SERVER['REQUEST_URI']; 
                	$patharr = explode('/',trim($path,'/'));
                	// p($patharr);
            		if(isset($patharr[0])){           //只输入一个index说明控制器有了       
                         $this->ctrl = $patharr[0];
                    }
                    unset($patharr[0]);               //卸载控制器方法
                    if(isset($patharr[1])){
                         $this->action = $patharr[1];
                          unset($patharr[1]);
                    } else {
                        // $this->action = 'index';
                   		$this->action = conf::get('ACTION','route');    //引入配置文件(第一个参数叫变量名,第二个参数叫文件名)
                    }
                     // p($patharr);
                    //url多余部分转换成GET
                    //index/index/id/3/test/3
                    $count = count($patharr)+2;
                    // p($count);
                    $i = 2;                               //i=2开始
                    while ( $i < $count) {
                        if(isset($patharr[$i+1])){        //如果参数为奇数，报参数越界的错误
                         $_GET[$patharr[$i]] = $patharr[$i+1];
                        }
                         $i = $i + 2; 
                    }
                    // p($_GET);
        
         		} else {
                    // $this->ctrl = 'index';
                    // $this->action = 'index';
                    $this->ctrl = conf::get('CTRL','route');             //因为用的比较多，所以直接引入配置文件
                    $this->action = conf::get('ACTION','route');
                }

           }
    }
?>