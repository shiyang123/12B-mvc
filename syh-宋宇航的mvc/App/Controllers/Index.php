<?php 
namespace App\Controllers;
use Core\Lib\Model;
/**
* 控制器
*/
class Index  extends \Core\System
{
	public function index()
	{
		// $CTRL=C('route','controller');
		// $data=\Core\Lib\config::all('route');
		// var_dump($data);
		// dd($CTRL);die;
		// echo '控制器';
		// $model=new \Core\Lib\Model();
		// $data=$model->select('t_user','*');
		// dump($data);
		// $data=$model->query('select * from t_user')->fetchAll(\PDO::FETCH_ASSOC);
		// dd($data);
		$this->assign('data','这是数据');
		$this->display('index.html');
	}
	 
}

?>