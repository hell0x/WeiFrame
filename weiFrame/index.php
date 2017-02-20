<?php
//入口文件
define('DS', DIRECTORY_SEPARATOR);   //定义目录分隔符
define('ROOT_PATH', __DIR__.DS);
require 'system/start.php';
core\Application::run();
?>