<?php
namespace app\controller;
class indexController extends \core\imooc
{
    public function index()
    {
        $temp = \core\lib\conf::get('CONTROLLER','route');
        print_r($temp);
       $data = "hello world";
       $title = "视图文件";
       $this -> assign('title',$title);
       $this -> assign('data',$data);
       $this -> dispaly('index.html');
      //p('it is index');
//        $model = new \core\lib\model();
//        $sql = "SELECT * FROM user ";
//        $res = $model->query($sql);
//        p($res->fetchAll());
    }

}