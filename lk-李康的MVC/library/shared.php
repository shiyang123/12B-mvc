<?php

/**
 * 配置公共文件
 * 
 */

	/**
	 * 报错处理方式
	 * true 直接页面显示
	 * false 页面不显示并写进错误日志
	 */
	function setReporting()
	{

		if(DEVELOPMENT_ENVIPONMENT==true){
			error_reporting(E_ALL);					//设置显示所有错误

			ini_set('display_errors','On');			//设置php.ini开启错误提示
		}else{

			error_reporting(E_ALL);

			ini_set('display_errors','Off');		//设置php.ini关闭错误提示

			ini_set('log_errors','On');				//设置php.ini开启错误日志

			ini_set('error_log',ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');	//将错误信息写入错误日志文件
		}
	}


	/**
	 * 敏感字符转义并移除
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	function stripSlashDeep($value)
	{
		$value = is_array($value)?array_map('stripSlashDeep',$value):stripSlashDeep($value);
		return $value;
	}

	/**
	 * 检测敏感字符
	 * @return [type] [description]
	 */
	function removeMagicQuotes()
	{
		if(get_magic_quotes_gpc()){

			$_GET = stripSlashDeep($_GET);

			$_POST = stripSlashDeep($_POST);

			$_COOKIE = stripSlashDeep($_COOKIE);
		}
	}

	/**
	 * 检测全局变量设置（register globals）并移除
	 * @return [type] [description]
	 */
	function unregisterGlobals()
	{
		if(ini_get('register_globals')){
			$array = array('_SESSION','_POST','_GET','_COOKIE','_REQUEST','_SERVER','_ENV','FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $val) {
					if($val === $GLOBALS[$key]){
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}




	/**
	 * 拆分url请求
	 * @return [type] [description]
	 */
	function callHook()
	{
		global $url;				//定义本页面全局变量

		$urlArray = array();

		$urlArray = explode("/",$url);	//url参数切割成数组
		
		$controller = $urlArray[0];		//将控制器名赋值给$controller

		array_shift($urlArray);			//将数组第一个单元移除数组
		
		$action = $urlArray[0];			//将方法名赋值给$action

		array_shift($urlArray);

		$queryString = $urlArray;

		$controllerName = $controller;

		$controller = ucwords($controller);		//将单词首字母大写

		$model = rtrim($controller,'s');		//去除末端s字母 获取model名

		$controller .= 'Controller';			//拼接控制器名
		//var_dump($controller);die;
		$dispatch = new $controller($model,$controllerName,$action);
		//echo $controller;die;
		if((int)method_exists($controller,$action)){
			
			call_user_func_array(array($dispatch,$action),$queryString);
			//var_dump($dispatch);die;
		}else{
			echo 'url输写错误';
		}
	}





	/**
	 * 自动加载控制器和模型
	 * @param  [type] $className [description]
	 * @return [type]            [description]
	 */
	function __autoload($className)
	{
		if($className=='Controller'||$className=='Model'){
			if(file_exists(ROOT.DS.'library'.DS.$className.'.class.php')){
				require_once(ROOT.DS.'library'.DS.$className.'.class.php');
			}
		}elseif(file_exists(ROOT.DS.'library'.DS.strtolower($className).'.class.php')){
			require_once(ROOT.DS.'library'.DS.strtolower($className).'.class.php');
		}elseif(file_exists(ROOT.DS.'application'.DS.'controllers'.DS.$className.'.php')){
			require_once(ROOT.DS.'application'.DS.'controllers'.DS.$className.'.php');
		}elseif(file_exists(ROOT.DS.'application'.DS.'models'.DS.$className.'.php')){
			require_once(ROOT.DS.'application'.DS.'models'.DS.$className.'.php');
		}else{

			echo '没有该文件'.$className;
		}
	}



	setReporting();

	removeMagicQuotes();

	unregisterGlobals();

	callHook();