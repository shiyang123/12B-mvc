<?php
namespace app\ctrl;

class indexCtrl extends \core\imooc
{
    public function index()
    {
        $temp = new \core\lib\model();
        $data = "Hello World";
        $title = "这是视图文件";
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display("index.html");
    }
}



