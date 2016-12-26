<?php
/*
 * 入口文件
 * */
header('Content-Type:Text/HTml;Charset=utf-8');
//调试开启
define('APP_DEBUG', TRUE);
//加载核心文件
require 'system/core/app.php';
//初始化
Application::init();
?>