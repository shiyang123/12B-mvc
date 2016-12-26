<?php
namespace app\controller;
class indexController
{
	
	public function index()
	{
		//p('it is index');
		$data = 'Hello word';
		$model = new \core\lib\model();
		$sql = "select * from function";
		$ret = $model->query($sql);
		p($ret->fetchAll());
	}
}