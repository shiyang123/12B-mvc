<?php 
namespace app\controllers;
use core\lib\model;

class indexController extends \core\mymvc
{
	public function index(){
		//p(1234);
		//$model=new model();
		//dump($model);

		$data="Hello word";
		//$title="这是视图文件";
		$view=$this->view();
		echo $view->render('index.html',['data'=>$data]);

		// $temp1= \core\lib\config::get('CONTROL','route');
		// $temp= \core\lib\config::get('ACTION','route');
		// p($temp);
		// p($temp1);
	}
}

