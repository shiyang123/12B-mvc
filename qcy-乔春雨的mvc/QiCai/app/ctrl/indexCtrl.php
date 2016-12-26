<?php
namespace app\ctrl;
class indexCtrl extends \core\imooc
{
	public function index()
	{
		// p('it is index');
		// $model = new \core\lib\model();
		// $sql = 'SELECT * FROM students';
		// $res = $model->query($sql);
		// p($res->fetchAll());
		// $temp = \core\lib\conf::get('CTRL','route');
		// $temp = \core\lib\conf::get('ACTION','route');
		$temp = new \core\lib\model();
		print_r($temp);
		$data = 'hello world!';
		$title = '哈哈';
		$this->assign('data',$data);
		$this->assign('title',$title);
		$this->display('index.html');
	}
}