<?php

/**
 * 入口文件
 *  1.定义常量
 *  2.引入框架引导文件
 */

define('DS',DIRECTORY_SEPARATOR); 			//定义常量DS为反斜杠 ‘/’
define('ROOT',dirname(dirname(__FILE__)));	//定义常量ROOT为项目根目录

$url = $_GET['url'];

require_once(ROOT.DS.'library'.DS.'bootstrap.php'); //引入框架引导文件


