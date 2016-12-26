<?php 
namespace app\ctrl;

class indexCtrl extends \roce\imooc
{
	public function index()
	{
		$model = array("fsd");
		$this->assign('data',$model);
		$this->display('index.html');
	}
}
?>