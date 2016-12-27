<?php
namespace core\lib;
use core\lib\conf;
// class model extends \PDO
class model extends \medoo
{
	public $table;//表名
	public function __construct()
	{
		//PDO
		// $database = conf::all('database');
		// try {
		// 	parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
		// } catch (\PDOException $e) {
		// 	p($e->getMessage());
		// }
		//medoo
		$option = conf::all('database');
		parent::__construct($option);
	}
		//查询（返回二维数组）
	public function show($field = '*',$where = ""){
		//$field是查询的字段默认为'*',当需要查询指定字段时需要数组格式 如：['name','sex']
		//$where查询条件默认为空，填写条件时需要数组格式 如：['id[=]'=>1]; 多条件 ['AND'=>['sex[=]'=>'1','id[>]'=>'5']]; 更多操作请参看 medoo中文手册http://medoo.lvtao.net/doc.where.php
		$data = $this->select($this->table,$field,$where);
		return $data;
	}
	//查询单条(返回一维数组)
	public function show_one($field = '*',$where = ''){
		$data = $this->get($this->table,$field,$where);
		return $data;
	}
	//入库
	public function add($data){
		//$data是要差入的数据数组格式['字段'=>'值'],插入成功后返回值为id，支持多条入库
		$res = $this->insert($this->table,$data);
		return $res;
	}
	//删除
	public function del($where){
		//$where是删除条件 如：['id[=]'=>'1'] 支持多条件['AND'=>['id[=]'=>'1','id[=]'=>'5']] 或者['id'=>['2','3','4']];
		$res = $this->delete($this->table, $where);
		return $res;
	}
	//修改
	public function upd($data,$where){
		$res = $this->update($this->table,$data,$where);
		return $res;
	}
}