<?php
namespace app\ctrl;
use core\lib\model;
class indexCtrl extends \core\imooc
{
    public function index()
    {
//        $temp = \core\lib\conf::get("CTRL","route");//传过去我们的路由类route
        $data = "Holle view";
        $title = "Holle";
        $this->assign("title",$title);
        $this->assign("data",$data);//传值
        $this->dispaly("index.html");//调用模板
    }
    public function indexs()
    {
        $db = new model();
        $sql = "select * from girl";
        $res = $db->query($sql)->fetchAll();
        p($res);
    }
}