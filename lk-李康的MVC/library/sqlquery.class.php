<?php




class SQLQuery
{

	protected $_dbHandle;    //数据库对象

	protected $_result; 	//返回值

	/**
	 * 连接数据库
	 * @param  [type] $address 数据库域名
	 * @param  [type] $account 数据库用户名
	 * @param  [type] $pwd     数据库密码
	 * @param  [type] $name    数据库库名
	 * @return [type]          [description]
	 */
	function connect($address,$account,$pwd,$name){
		$this->_dbHandle = @mysql_connect($address,$account,$pwd);
		if($this->_dbHandle != 0){
			if(mysql_select_db($name,$this->_dbHandle)){

				return 1;
			}else{

				return 0;
			}
		}else{

			return 0;
		}
	}


	/**
	 * 中端数据库理解
	 * @return [type] [description]
	 */
	function disconnect(){
		if(@mysql_close($this->_dbHandle != 0)){

			return 1;
		}else{

			return 0;
		}
	}

	/**
	 * 查询数据表所有数据
	 * @return [type] [description]
	 */
	function selectAll(){

		$query = 'select * from `'.$this->_table.'`';
		return $this->query($query);
	}


	/**
	 * 以id查询数据表一条数据
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	function select($id){
		//var_dump($id);die;
		$query = 'select * from `'.$this->_table.'` where `id` = \''.mysql_real_escape_string($id).'\'';
		return $this->query($query,1);
	}

	/**
	 * 自定义sql查询语句
	 * @param  [type]  $query        [description]
	 * @param  integer $singleResult [description]
	 * @return [type]                [description]
	 */
	function query($query,$singleResult = 0){
		$this->_result = mysql_query($query,$this->_dbHandle);

		if(preg_match("/select/i",$query)){

			$result = array();

			$table = array();

			$field = array();

			$tempResults = array();

			$numOfFields = mysql_num_fields($this->_result);

			for ($i=0; $i < $numOfFields; ++$i) { 
				array_push($table,mysql_field_table($this->_result,$i));
				array_push($field,mysql_field_name($this->_result,$i));
			}

			while ($row = mysql_fetch_row($this->_result)) {
				for ($i=0; $i < $numOfFields; ++$i) { 
					$table[$i] = trim(ucfirst($table[$i]),'s');
					$tempResults[$table[$i]][$field[$i]] = $row[$i];
				}

				if($singleResult == 1){

					mysql_free_result($this->_result);

					return $tempResults;
				}

				array_push($result,$tempResults);
			}

			mysql_free_result($this->_result);

			return $result;
		}
	}


	/**
	 * 统计数据个数
	 * @return [type] [description]
	 */
	function getNumRows(){

		return mysql_num_rows($this->_result);
	}

	/**
	 * 释放结果集内存
	 * @return [type] [description]
	 */
	function freeResult()
	{
		mysql_free_result($this->_result);
	}


	/**
	 * 返回mysql操作错误信息
	 * @return [type] [description]
	 */
	function getError()
	{
		return mysql_error($this->_result);
	}
}