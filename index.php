<?php
//定义分隔符和框架根目录
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', __DIR__.DS);

//定义应用目录，配置目录，运行时目录，框架核心文件目录
define('APP_PATH', ROOT_PATH.'application'.DS);
define('CONF_PATH', ROOT_PATH.'config'.DS);
define('RUNTIME_PATH', ROOT_PATH.'runtime'.DS);
define('SYS_PATH', ROOT_PATH.'system'.DS);

define('BASEPATH', SYS_PATH.'core'.DS);

//引入框架引导文件
require_once SYS_PATH.'WeiLead.php';
?>
