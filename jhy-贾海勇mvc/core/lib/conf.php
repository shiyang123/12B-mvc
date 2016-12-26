<?php  
namespace core\lib;

class conf{
    static  public $conf = array();
    static  public  function  get($name,$file){
    		/**
    		 * 1、判断配置文件是否存在 
    		 * 2、判断配置是否存在
    		 * 3、缓存配置
    		 */
    		$file = PATH.'/core/config/'.$file.'.php';
    		 //判断配置文件是否存在
    		 if(is_file($file)){
    		 	$conf = include $file;
    		    //判断配置是否存在
    		 	if(isset($conf[$name])){
 					self::$conf[$file] = $conf;
 					return $conf[$name];
    		 	}else{
    		 	throw new \Exception('找不到配置项'.$name);	
    		 	}
    		 }else{
    		 	throw new \Exception('找不到配置文件'.$file);
    		 }
    } 
}



?>