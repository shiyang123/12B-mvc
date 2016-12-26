<?php
namespace app\ctrl;
class indexCtrl extends \core\framwork
{
    public function index(){
        //p('it is index');
//    $model = new \core\lib\db();
//    $sql="select * from user";
//    $ret= $model->query($sql);
//    p($ret->fetchAll());
        $data='Hello World';
        $title='视图文件';
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display('index.html');
    }
}