<?php
//加载常量定义文件
//暂时不写...

//引入全局函数文件
require_once BASEPATH.'Common.php';

//错误异常处理
//暂时不写...

//加载地址解析类
// $URI = &load_class('URI', 'core');

//加载控制器基类
require_once BASEPATH.'Controller.php';
$config = &get_config();

//加载路由类,并实例化控制器
$ROU = &load_class('Router', 'core');
?>