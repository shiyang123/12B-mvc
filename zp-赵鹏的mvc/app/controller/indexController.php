<?php
namespace app\controller;
class indexController
{
	
	public function index()
	{
		//p('it is index');
		$data = 'Hello word';
		$model = new \core\lib\model();
		$sql = "select * from cate";
		$ret = $model->query($sql);
		p($ret->fetchAll());
	}
}