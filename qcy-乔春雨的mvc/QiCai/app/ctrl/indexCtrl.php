<?php
namespace app\ctrl;
use core\lib\model;
class indexCtrl extends \core\imooc
{
	public function index()
	{
		$model = new \app\model\studentsModel();
		$where = ['id'=>'10'];
		$data = ['sex'=>'1'];
		$res = $model->upd($data,$where);
		// dump($res);
		$data = 'Hello World!';
		$title = '柒彩';
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->display('index.html');
	}

	public function test()
	{
		$data = 'Hello World!';
		$title = '柚子';
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->display('test.html');
	}
}