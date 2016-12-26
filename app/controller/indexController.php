<?php
namespace app\controller;
header("content-type:text/html;charset=utf-8");
class indexController extends \core\mvc
{
	
	public function index()
	{
		//p('it is index');
		$data = 'Hello word';
		$title = "视图文件";
		$this->assign('title',$title);
		$this->assign('data',$data);
		$this->display('index.html');
	}
}