<?php

namespace app\ctrl;

class indexCtrl extends \core\imooc
{

    public function index()
    {

       //$temp=\core\lib\conf::get('CTRL','route');
       //print_r($temp);

      /* $model = new \core\lib\model();
       $sql="select * from user";
       $arr=$model->query($sql);
       p($arr->fetchAll());*/

       	// $temp = \core\lib\conf::get('CTRL','route');
       	// $temps = \core\lib\conf::get('ACTION','route');
       	$temp = new \core\lib\model();
       	print_r($temp);
       	// print_r($temps);

       	$data = "Hello World";
       	$title = '这里是试图文件';
       	$this->assign('data',$data);
       	$this->assign('title',$title);
       	$this->display('index.html');


    }
}

?>