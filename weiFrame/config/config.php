<?php
return [
	//数据库配置
	'db_host' => '127.0.0.1',
	'db_user' => 'root',
	'db_pwd'  => '',
	'db_name' => 'weiframe',
	'db_table_prefix' => 'wei_',
	'db_charset' => 'utf8',

	'default_module' => 'home',   //默认模块
	'default_controller' => 'Index',   //默认控制器
	'default_action' => 'index',   //默认操作方法
	'url_type' => 2, //URL模式: 1.普通模式,传统url参数模式  2.PATHINFO模式，也是本框架默认模式

	'cache_path' => RUNTIME_PATH.'cache'.DS,   //缓存存放路径
	'cache_prefix' => 'cache_',   //缓存文件前缀
	'cache_type' => 'file',   ///缓存类型(只是先file类型)
	'compile_path' => RUNTIME_PATH.'compile'.DS,   //编译文件存放路径

	'view_path' => APP_PATH.'home'.DS.'view'.DS,   //模板路径
	'view_suffix' => '.php',   //模板后缀

	'auto_cache' => true,   //开启自动缓存
	'url_html_suffix' => 'html',   //url伪静态后缀
	
];
?>