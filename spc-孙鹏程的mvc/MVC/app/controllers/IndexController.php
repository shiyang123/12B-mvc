<?php

namespace app\controllers;

class IndexController extends \core\mvc
{
    public function index()
    {
        p("this is index");
        $model = new \core\lib\model();
        $sql = "select * from user";
        $ret = $model->query($sql)->fetchAll();
        $this->assign('list',$ret);
        $this->display('index.php');
    }
}