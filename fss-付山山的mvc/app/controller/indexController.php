<?php
namespace app\controller;
class indexController
{
	public function index(){
	
		echo "this is a index<br>";
		$model = new \core\lib\model();
		$sql = 'SELECT * FROM user';
		$result = $model->query($sql);
		p($result->fetchAll());
		$data = 'Hellow Word';
		$this->assign('data',['name'=>'zhangsan','age'=>12]);
		$this->display('index/index.html');
	}

	public function user2(){
		echo "string";
	}
}
 
?>
