<?php


/**
 * 
 * 控制器类
 * 
 */

class Controller
{
	protected $_model;		//受保护的model属性

	protected $_controller;	//受保护的controller属性

	protected $_action;		//受保护的action属性

	protected $_template;	//受保护的模板属性

	function __construct($model,$controller,$action){
		$this->_controller = $controller;
		$this->model = $model;
		$this->action = $action;
		$this->$model = new $model;
		$this->_template = new Template($controller,$action);
	}



	/**
	 * 渲染视图层
	 * @param string $name  视图文件名
	 * @param string $array 视图文件赋值
	 */
	function view($name='',$array=array()){

		$this->_template->set($name,$array);
	}


	/**
	 * 释放视图文件缓存
	 */
	function __destruct(){

		$this->_template->render();
	}
}

