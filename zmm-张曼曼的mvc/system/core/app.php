<?php
class Application {
	/*
	 * 初始化文件
	 * */
	static function init() {
		//定义路径
		self::setPath();
		//报错级别
		self::setError();
		// 配置文件
		self::setConfig();
		//安全过滤
		self::setilter();
		//路由
		self::setRouter();
		//加载类库
		self::libClass();
		self::loadClass();
		//创建对象
		self::newObject();
		

	}

	//路径
	static function setPath() {
		//定义根路径
		define('ROOT_PATH', str_replace('\\', '/', dirname(dirname(__DIR__))) . '/');
		//配置文件
		define('CONFIG_PATH', ROOT_PATH . 'application/');
		//核心文件
		define('SYS_PATH', ROOT_PATH . 'system/');
		define('LIB_PATH', ROOT_PATH . 'system/libraries/');
		//加载类

		//项目文件目录：控制器、模型等等
		define('APP_PATH', ROOT_PATH . 'application/controllers/');
		//加载视图
		define('VIEWS_APTH', CONFIG_PATH . 'views/');

	}

	static function autoLoad($className) {
		//spl_autoload_register();
	}

	//报错级别
	static function setError() {
		/*
		 ini_get_all()
		 ini_get('global_value');
		 ini_set($varname, $newvalue)
		 */
		if (defined(APP_DEBUG)) {
			error_reporting(0);
		} else {
			error_reporting(E_ALL);
		}
	}

	//配置文件
	static function setConfig() {
		require_once CONFIG_PATH . 'config/config.php';
		//初始化全局中
		$GLOBALS['config'] = $config;

	}

	//安全过滤
	static function setilter() {

	}

	//路由
	static function setRouter() {
		//得到路由的控制器与方法
		$controller = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		$action = isset($_GET['a']) ? $_GET['a'] : 'index';
		define('CONTROLLER_NAME', $controller);
		define('ACTION_NAME', $action);

	}

	// 加载类库
	static function loadClass() {
		$classFile = APP_PATH . CONTROLLER_NAME . 'Controller.class.php';	
		require_once $classFile;
	}

	//创建对象
	static function newObject() {
		$controlName = CONTROLLER_NAME . 'Controller';
		$actionName = ACTION_NAME;
		$obj = new $controlName;
		$obj -> $actionName();
	}

	//加载核心文件
	static function libClass() {
		require_once LIB_PATH . 'db.class.php';
		require_once LIB_PATH . 'mysql.class.php';
	}

}
?>