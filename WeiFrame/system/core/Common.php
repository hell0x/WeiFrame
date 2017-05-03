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

/**
 * 获取配置的函数
 */
if(!function_exists('get_config')){

	function &get_config($file = 'config'){
		
		if($file=='config'){
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
		}elseif($file=='database'){
			static $db;
			if(empty($db)){
				$file_path = CONF_PATH.'database.php';
				if(file_exists($file_path)){
					require_once($file_path);
				}else{
					exit('The database file does not exist.');
				}
			}
			return $db;
		}
	}
}

/**
 * 自定义PHP错误处理函数
 * 当出现PHP错误时触发此函数
 */
if(!function_exists('_error_handler')){

	function _error_handler($errno, $errstr, $errfile, $errline){
		// echo $severity.$message.$filepath.$line;
		//判断是否是致命错误
		$is_error = (((E_ERROR | E_COMPILE_ERROR | E_CORE_ERROR | E_USER_ERROR) & $errno) === $errno);

		if($is_error)	set_status_header(500);

		//对于不需要的错误直接中断
		if(($errno & error_reporting()) !== $errno)	return;

		//是否展示错误
		if(str_ireplace(array('off', 'none', 'no', 'false', 'null'), '', ini_get('display_errors'))){
			$_error = &load_class('Exceptions', 'core');
			$_error->show_php_error($errno, $errstr, $errfile, $errline);
		}

		//如果是致命错误则exit
		if($is_error)	exit();
	}
}

/**
 * 自定义PHP异常处理函数
 * 当出现PHP异常时触发此函数
 */
if(!function_exists('_exception_handler')){

	function _exception_handler($exception){
		$_error =& load_class('Exceptions', 'core');
		if (str_ireplace(array('off', 'none', 'no', 'false', 'null'), '', ini_get('display_errors'))){
			$_error->show_exception($exception);
		}
	}
}

/**
 * 错误处理函数
 * 可根据需要使用此函数产生错误页面
 * @param 错误信息
 * @param 状态码
 * @param 错误信息头
 */
if(!function_exists('show_error')){

	function show_error($message, $status_code=500, $template='error_default', $heading="error message"){

		$_error = &load_class('Exceptions', 'core');
		echo $_error->show_error($message, $status_code, $template, $heading);
	}
}

/**
 * 404处理函数
 * @param 页面名称
 */
if(!function_exists('show_404')){

	function show_404($message='The page you requested was not found.', $template = 'error_404'){
		$_error = &load_class('Exceptions', 'core');
		echo $_error->show_404($message, $template);
	}
}

/**
 * 设置HTTP的状态头
 * @param 状态码
 * @param 状态信息
 */
if(!function_exists('set_status_header')){

	function set_status_header($code, $text=''){
		//确定状态码是数字
		if (empty($code) OR ! is_numeric($code)){
			show_error('Status codes must be numeric', 500);
		}
		is_int($code) OR $code = (int)$code;
		if(empty($code)){
			$s_code = array(
				100	=> 'Continue',
				101	=> 'Switching Protocols',

				200	=> 'OK',
				201	=> 'Created',
				202	=> 'Accepted',
				203	=> 'Non-Authoritative Information',
				204	=> 'No Content',
				205	=> 'Reset Content',
				206	=> 'Partial Content',

				300	=> 'Multiple Choices',
				301	=> 'Moved Permanently',
				302	=> 'Found',
				303	=> 'See Other',
				304	=> 'Not Modified',
				305	=> 'Use Proxy',
				307	=> 'Temporary Redirect',

				400	=> 'Bad Request',
				401	=> 'Unauthorized',
				402	=> 'Payment Required',
				403	=> 'Forbidden',
				404	=> 'Not Found',
				405	=> 'Method Not Allowed',
				406	=> 'Not Acceptable',
				407	=> 'Proxy Authentication Required',
				408	=> 'Request Timeout',
				409	=> 'Conflict',
				410	=> 'Gone',
				411	=> 'Length Required',
				412	=> 'Precondition Failed',
				413	=> 'Request Entity Too Large',
				414	=> 'Request-URI Too Long',
				415	=> 'Unsupported Media Type',
				416	=> 'Requested Range Not Satisfiable',
				417	=> 'Expectation Failed',
				422	=> 'Unprocessable Entity',

				500	=> 'Internal Server Error',
				501	=> 'Not Implemented',
				502	=> 'Bad Gateway',
				503	=> 'Service Unavailable',
				504	=> 'Gateway Timeout',
				505	=> 'HTTP Version Not Supported'
			);
		}
		if(isset($s_code[$code])){
			$text = $s_code[$code];
		}else{
			$text = 'No status text available';
		}
		$protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
		header($protocol.' '.$code.' '.$text, TRUE, $code);
	}
}
?>