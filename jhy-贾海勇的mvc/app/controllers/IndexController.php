<?php 
namespace app\controllers;

class IndexController extends \core\run
{
    public function index(){

    	// p("this is a action");
    	//连接数据库
    	// $model = new \core\lib\model();
    	// $sql = "SELECT * FROM message";
    	// $re = $model->query($sql);
    	// p($re->fetchAll());
       $data = "hahahaa";
       //视图
       $this->assign('data',$data);
       $this->display('index.html');
    }


    public function show(){
    	p('jiaoweiwei');
    }
}




 ?>