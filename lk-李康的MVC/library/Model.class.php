<?php


/**
 *
 *框架model核心类
 * 
 */
class Model extends SQLQuery
{
	protected $_model;		//定义受保护的_model属性

	function __construct(){

		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model).'s';
	}


	function __destruct(){
		
	}
}