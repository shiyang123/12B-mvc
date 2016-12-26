<?php 
namespace app\ctrl;
class indexCtrl  extends \core\run
   {

       public function index()
       {
             //P("this is index");
             // $model = new \core\lib\model();
             // $sql="select * from user";
             // $arr=$model->query($sql);
             // p($arr->fetchAll());
           $data = "hello world";
           $this->assign("data",$data);
           $this->display('index/index.html');
       }

  }

?>