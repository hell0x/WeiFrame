<?php
/**
 * 全局函数，各种常用函数
 */

/**
 * 加载类库文件函数
 * @param 类的文件名
 * @param 类库所在的目录，默认是core
 * @param 所带参数
 */
if(!function_exists('load_class')){

	function &load_class($class, $directory = 'core', $param = NULL){
		static $_classes = array();

		/**
		 * $_classes为局部静态变量，该变量会一直存在
		 * 如果类存在，可以直接加载
		 */
		if(isset($_classes[$class])){
			return $_classes[$class];
		}

		$name = FALSE;
		$file_path = SYS_PATH.$directory.DS.$class.'.php';
		//判断文件是否存在
		if(file_exists($file_path)){
			$name = 'Wei_'.$class;
			//判断类是否存在，第二项设为FLASE表示不自动用__autoload()加载类，提高效率
			if(class_exists($name, FALSE) === FALSE){
				require_once($file_path);
			}
		}

		//如果文件没有被加载，报错
		if($name === FALSE){
			echo $file_path."加载失败";
			exit();
		}

		//实例化类，并存入数组
		$_classes[$class] = isset($param) ? new $name($param) : new $name();
		
		return $_classes[$class];
	}
}

if(!function_exists('get_config')){

	function &get_config(){
		static $config;

		if(empty($config)){
			$file_path = CONF_PATH.'config.php';
			if(file_exists($file_path)){
				require_once($file_path);
			}else{
				exit('The configuration file does not exist.');
			}
		}
		return $config;
	}
}
?>