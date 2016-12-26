<?php
class IndexController {
	public function index() {
		require VIEWS_APTH . 'add.html';
	}

	public function show() {
		$res = Mysql::getIns();
		//$result = $res -> getAll('select * from type');
		//$result = $res ->getRow('select * from type');
		$result = $res -> autoExecute('type',array('type_id'=>5),'update','type_name=asdf');
		echo $res->affected_rows();
		print_r($result);die;
	}

}
?>