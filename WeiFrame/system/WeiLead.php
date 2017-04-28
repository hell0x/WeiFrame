<?php
//加载常量定义文件
//暂时不写...

//引入全局函数文件
require_once BASEPATH.'Common.php';

set_error_handler('_error_handler');
// set_exception_handler('_exception_handler');

//错误异常处理
//暂时不写...

//加载地址解析类
// $URI = &load_class('URI', 'core');

//加载控制器基类
require_once BASEPATH.'Controller.php';

//加载路由类,并实例化控制器
$ROU = &load_class('Router', 'core');
?>