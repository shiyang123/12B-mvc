<?php 
namespace app\ctrl;
class indexCtrl extends \core\framework
{
	public function index()
	{
		 /*数据库调用*/
		//$model  = new core\lib\model();
		//echo 'This is Constoll';
		//$sql = 	"select * from admin";
		// $ret = $model->query($sql);
		// //$arr = mysql_query($sql);
		// //var_dump($arr);
		// var_dump($ret->fetchAll());

		/*new 一个控制器文件*/
		//$temp = \core\lib\conf::get('CTRL','route');
		//$temp = \core\lib\conf::get('ACTION','route');
		$temp = new \core\lib\model();
		//print_r($temp);

		/*传值跳转到视图层*/
		$data = 'Hello God';
		$this->assign('data',$data);
		$this->display('/index.html');
	}
}
?>