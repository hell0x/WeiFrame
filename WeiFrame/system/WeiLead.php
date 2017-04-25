<?php
//引入常量定义文件
//暂时不写...

//引入全局函数文件
require_once BASEPATH.'Common.php';

//错误异常处理
//暂时不写...

//引入地址解析类
$URI = &load_class('URI', 'core');
echo "<pre>";
print_r($URI);
echo "</pre>";
?>