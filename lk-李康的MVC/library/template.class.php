<?php 

/**
 *
 * 框架模板类文件
 * 
 */
class Template
{
	protected $variables = array();     //设置受保护的空数组$variables

	protected $_controller;				//设置受保护变量$_controller 用于存储controller

	protected $_action;					//设置受保护变量$_action 用于存储action

	function __construct($controller,$action)
	{
		$this->_controller = $controller;
		$this->_action = $action;
	}



	/**
	 * 设置变量
	 * @param [type] $name  视图文件名
	 * @param [type] $array 数组value值
	 */
	function set($name,$array)
	{
		if(!empty($name)){

			$this->_action = $name;
		}
		$this->variables = $array;
	}



	/**
	 * 显示视图
	 * @return [type] [description]
	 */
	function render()
	{
		if(!empty($this->variables)){
			foreach ($this->variables as $key => $value) {

				extract(array($key=>$value));	//将变量导入当前符号表
			}
		}

		if(file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php')){
			include(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'header.php');
		}else{
			include(ROOT.DS.'application'.DS.'views'.DS.'header.php');
		}
		include(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.$this->_action.'.php');

		if(file_exists(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php')){
			include(ROOT.DS.'application'.DS.'views'.DS.$this->_controller.DS.'footer.php');
		}else{
			include(ROOT.DS.'application'.DS.'views'.DS.'footer.php');
		}

		
	}
}