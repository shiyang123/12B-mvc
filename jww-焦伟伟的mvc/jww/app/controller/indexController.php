<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2016/12/24
 * Time: 16:12
 */
namespace app\controller;
class indexController extends \core\ww{
    public function index(){

        //加载配置项
        $temp = new \core\lib\model();
        p($temp);
        $data = "Hello World";
        $title = "视图文件！";
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');
    }
}