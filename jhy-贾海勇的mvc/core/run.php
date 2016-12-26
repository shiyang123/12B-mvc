<?php  
namespace core;

class run{

	//设置自动加载类数组
    public static $classMap = array();
    //设置传值属性
    public $assign;
    
	static public function run(){
		//实例化路由
		$route = new \core\lib\route();
		$controllerClass = $route->controller;
  		$action = $route->action;
  		//控制器文件
  		$ctrFile = APP.'/controllers/'.$controllerClass.'Controller.php';
  		//实例化控制器类
        $ctrClass = '\\'.MODULE.'\controllers\\'.$controllerClass.'Controller';

  		   if(is_file($ctrFile)){
  		   		include($ctrFile);
  		   		$ctrl = new $ctrClass();
  		   		$ctrl->$action();
  		   }else{
  		   	 throw new \Exception('找不到控制器'.$controllerClass);
  		   }
	}

	/**
     * [自动加载方法]
     * @return [void] 
     */
	static public function load($class){
		//p($class);
		//p(PATH.$class.'.php');       
       //自动加载类库
       // new \core\route();
       // $clas = '\core\route';
       //PATH.'/core/route.php'
    
       //如果类名存在就返回true
       if(isset($classMap[$class])){

  		   return true;
  		  

       }else{ 
       	  //加载类
       	    //将类名格式进行转换
           str_replace('\\','/',$class);
       	   $file = PATH.'/'.$class.'.php';
	       if(is_file($file)){
	       	 // p($file);exit;
	            include $file;
	            self::$classMap[$class] = $class;
	       }else{
	       	   return false;
	       }

       }
	}



	/**
	 * 视图传值方法
	 * @param  [type] $name  [视图变量]
	 * @param  [type] $value [控制器变量]
	 * @return [array]        [所传值]
	 */
	public function assign($name,$value){
		 $this->assign[$name] = $value;
	}

	/**
	 * [渲染模板页面]
	 * @param  [type] $file [视图文件]
	 * @return [void]       
	 */
	public function display($file){
		$file = APP.'/views/'.$file;
		 if(is_file($file)){
		 	extract($this->assign);
		 	include $file;
		 }
	}
}






?>