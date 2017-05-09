<?php
	//Runtime配置
	$config['cache_path']   = RUNTIME_PATH.'cache'.DS;		//缓存目录
	// 'compile_path' => RUNTIME_PATH.'compile'.DS,	//编译目录
	$config['view_path']    = APP_PATH.'view'.DS;			//模板目录
	
	/**
	 * 缓存配置
	 */
	//1.页面静态缓存
	$config['auto_cache']   = true;	//是否开启页面自动缓存
	$config['cache_time']	= 60;		//页面静态缓存有效期
?>