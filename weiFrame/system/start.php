<?php
//框架启动文件
define('APP_PATH', ROOT_PATH.'application'.DS);
define('RUNTIME_PATH', ROOT_PATH.'runtime'.DS);
define('CONF_PATH', ROOT_PATH.'config'.DS);
define('CORE_PATH', ROOT_PATH.'system'.DS.'core'.DS);

//引入自动加载文件
require CORE_PATH.'Loader.php';

//实例化自动加载类
$loader = new core\Loader();
$loader->addNamespace('core', ROOT_PATH.'system'.DS.'core');
$loader->addNamespace('home', APP_PATH.'home');
$loader->register();   //注册命名空间

//加载全局配置
\core\Config::set(include CONF_PATH.'config.php');

?>