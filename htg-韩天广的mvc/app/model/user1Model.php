<?php

namespace app\model;
use core\lib\model;

class user1Model extends model
{
	public $table = 'user1';

	//查询
	public function lists()
	{
		$res = $this->select($this->table,'*');
		return $res;
	}

	//查询单条
	public function getOne($id)
	{
		$res = $this->get($this->table,'*',array('id'=>$id));
		return $res;
	}

	//添加
	public function insertAdd($data)
	{
		$res = $this->insert($this->table,$data);
		return $res;
	}

	//修改
	public function updateOne($data,$id)
	{
		$res = $this->update($this->table,$data,array('id'=>$id));
		return $res;
	}

	//删除
	public function delOne($id)
	{
		$res = $this->delete($this->table,array('id'=>$id));
		return $res;
	}




}