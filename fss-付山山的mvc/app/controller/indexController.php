<?php
namespace app\controller;
class indexController extends \core\myFrame{
	public function index(){
		p('this is a index');
		// echo "this is a index<br>";
		// $model = new \core\lib\model();
		// $sql = 'SELECT * FROM recode';
		// $result = $model->query($sql);
		// p($result->fetchAll());
		// $data = 'Hellow Word';
		// $this->assign('data',['name'=>'zhangsan','age'=>12]);
		// $this->display('index/index.html');
	}

	public function user2(){
		echo "string";
	}
}
 
?>
