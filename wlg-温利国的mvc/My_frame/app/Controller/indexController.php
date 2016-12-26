<?php
namespace app\Controller;
class indexController extends \core\core
{
	public function index()
	{
		$model = new \core\lib\model('127.0.0.1','root','root','kao');
		$data = $model->select('goods');
		$this->view('index.php',array('data' => $data));
	}
}