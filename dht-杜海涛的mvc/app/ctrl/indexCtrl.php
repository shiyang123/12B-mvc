<?php
namespace app\ctrl;

class indexCtrl extends \core\imooc
{
    public function index()
    {
        $temp = new \core\lib\model();
        $data = "Hello World";
        $title = "������ͼ�ļ�";
        $this->assign('title',$title);
        $this->assign('data',$data);
        $this->display("index.html");
    }
}



