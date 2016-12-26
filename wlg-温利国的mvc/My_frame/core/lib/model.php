<?php
namespace core\lib;
class model 
{
	public function __construct($db,$username,$password,$dbname)
	{
		mysql_connect($db,$username,$password);
		mysql_query('set names utf8');
		mysql_select_db($dbname);
	}
	/**
	 * query方法
	 */
	public function query($sql)
	{
		$result = mysql_query($sql);
		return $result;
	}
	/**
	 * 查询方法
	 */
	public function select($tableName)
	{
		$sql = 'SELECT * FROM '.$tableName;
		$result = $this->query($sql);
		$arr = array();
		while ($row = mysql_fetch_assoc($result)) {
			$arr[] = $row;
		}
		return $arr;
	}
	/**
	 * 删除方法
	 */
	public function delete($tableName,$where)
	{
		$sql = 'DELETE FROM '.$tableName.' WHERE '.$where;
		$result = $this->query($sql);
		if ($result) {
			return $this->affectedRow();
		} else {
			return false;
		}
	}
	/**
	 * 查询单条
	 */
	public function find($tableName,$where)
	{
		$sql = "SELECT * FROM $tableName WHERE " .$where;
		$result = $this->query($sql);
		$res = mysql_fetch_assoc($result);
		return $res;
	}
	/**
	 * 受影响行数
	 */
	public function affectedRow()
	{
		return mysql_affected_rows();
	}
}