<?php
namespace core\lib;
use core\lib\conf;
class route
{
    public $ctrl;//属性
    public $artion;//方法
    public function __construct()
    {
        /**
         * 1.隐藏掉index.php
         * 2.获取URL 参数部分
         * 3.返回对应的控制器和方法
         */
        //判断URL 是否存在
        if(isset($_SERVER["REQUEST_URI"]) && $_SERVER["REQUEST_URI"]!= "/"){
            //把/index/index 路由解析出来
            $path = $_SERVER["REQUEST_URI"];
            $patharr = explode("/",trim($path,"/"));
            if(isset($patharr[0])){
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])){
                $this->artion = $patharr[1];
                unset($patharr[1]);
            }else{
                $this->artion = conf::get("ACTION","route");
            }
            //把URL的多余部分准换成get参数
            $count = count($patharr) + 2;
            $i = 2;
            while($i < $count){
                if(isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }
        }else{
            $this->ctrl = conf::get("CTRL","route");//默认控制器
            $this->artion = conf::get("ACTION","route");//默认方法
        }
    }
}