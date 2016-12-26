<?php
namespace app\controller;
class indexController extends \core\myFrame{
	public function index(){
		// echo "this is a index<br>";
		$model = new \core\lib\model();
		$sql = 'SELECT * FROM recode';
		$result = $model->query($sql);
		dump($result->fetchAll());die;
		// $data = 'Hellow Word';
		// $this->assign('data',['name'=>'zhangsan','age'=>12]);
		// $this->display('index/index.html');
		// $temp = \core\lib\conf::get('route','CONTROLLER');
		// $aa = \core\lib\conf::get('route','ACTION');
		// p($aa);
		// p($temp);
	}

	public function user2(){
		echo "string";
	}
}
 
?>
