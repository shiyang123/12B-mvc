<?php

namespace app\ctrl;
use \core\lib\model;

class indexCtrl extends \core\imooc
{

    public function index()
    {
        $model = new \app\model\user1Model();

        //查询
        $data = $model->lists();

        //查询单条
        $data = $model->getOne(4);

        //添加
        $arr = array('name'=>'张');
        $data = $model->insertAdd($arr);

        //修改
        $arr = array('name'=>'yoyo');
        $data = $model->updateOne($arr,9);

        //删除
        $data = $model->delOne(12);

        var_dump($data);
        
       
        // $sql="select * from user";
        // $arr=$model->query($sql);
        // p($arr->fetchAll());

       	// $temp = \core\lib\conf::get('CTRL','route');
       	// $temps = \core\lib\conf::get('ACTION','route');
       	// $temp = new \core\lib\model();
       	// print_r($temp);
       	// print_r($temps);

       	// $data = "Hello World";
       	// $title = '这里是试图文件';
       	// $this->assign('data',$data);
       	// $this->assign('title',$title);
       	// $this->display('index.html');


    }
}

?>