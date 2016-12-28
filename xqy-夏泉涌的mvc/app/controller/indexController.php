<?php
namespace app\controller;

use core\xia;

class indexController extends xia
{
	public function index()
	{
		$temp = \core\lib\conf::get('CONTROLLER','route');
		$temp = \core\lib\conf::get('ACTION','route');
		p($temp);
		$data = "ssss";
		$this->assign('data',$data);
		$this->display('index.html');
	}
}