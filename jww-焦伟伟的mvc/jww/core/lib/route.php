<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/24
 * Time: 11:18
 * 路由文件
 */
namespace core\lib;
use core\lib\config;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/',trim($path,'/'));
            //p($pathArr);die;
            if(isset($pathArr[2])){
                $this->ctrl = $pathArr[2];
            }else{
                $this->ctrl='index';
            }
            if(isset($pathArr[3])){
                $this->action = $pathArr[3];
            }else{
                $this->action=config::get('ACTION','route');
            }
            unset($pathArr[0],$pathArr[1],$pathArr[2],$pathArr[3]);
            //url的多余部分转化成GET
            //p($pathArr);die;
            $pathArr = array_merge($pathArr);
            $count = count($pathArr)/2;
            //p($count);die;
            for($i=0;$i<$count;$i++){
                $_GET[$pathArr[2*$i]] = $pathArr[2*$i+1];
            }
        }else{
            $this->$ctrl = config::get('CONTROLLER','route');
            $this->action = config::get('ACTION','route');
        }
    }
}