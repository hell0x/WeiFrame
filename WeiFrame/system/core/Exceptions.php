<?php
class Wei_Exceptions{

	//缓冲嵌套级别
	public $ob_level;

	//错误类别说明
	public $levels = array(
		E_ERROR			=>	'Error',
		E_WARNING		=>	'Warning',
		E_PARSE			=>	'Parsing Error',
		E_NOTICE		=>	'Notice',
		E_CORE_ERROR		=>	'Core Error',
		E_CORE_WARNING		=>	'Core Warning',
		E_COMPILE_ERROR		=>	'Compile Error',
		E_COMPILE_WARNING	=>	'Compile Warning',
		E_USER_ERROR		=>	'User Error',
		E_USER_WARNING		=>	'User Warning',
		E_USER_NOTICE		=>	'User Notice',
		E_STRICT		=>	'Runtime Notice'
	);

	public function __construct(){
		$this->ob_level = ob_get_level();
	}

	public function show_error($message, $status_code=500, $template='error_default', $heading="error message"){
		$template_path = APP_PATH.'view'.DS.'error_template'.DS.$template.'.php';
		if(!file_exists($template_path)){
			show_404();
		}
		if(ob_get_level() > $this->ob_level + 1){
			ob_end_flush();
		}
		ob_start();
		include($template_path);
		$buffer = ob_get_contents();
		ob_end_clean();
		echo $buffer;
		exit();
	}

	public function show_404($message, $template){
		$heading = 'Not Found';
		echo $this->show_error($message, 404, $template, $heading);
	}

	public function show_php_error($errno, $errstr, $errfile, $errline){
		$template_path = APP_PATH.'view'.DS.'error_template'.DS.'error_php.php';
		if(!file_exists($template_path)){
			show_404('/application/view/error_template/error_php.php was not found');
		}
		$severity = isset($this->levels[$errno]) ? $this->levels[$errno] : $errno;
		if(ob_get_level() > $this->ob_level + 1){
			ob_end_flush();
		}
		ob_start();
		include($template_path);
		$buffer = ob_get_contents();
		ob_end_clean();
		echo $buffer;
		exit();
	}

	public function show_exception($exception){
		$template_path = APP_PATH.'view'.DS.'error_template'.DS.'error_exception.php';
		if(!file_exists($template_path)){
			show_404('/application/view/error_template/error_exception.php was not found');
		}
		if(ob_get_level() > $this->ob_level + 1){
			ob_end_flush();
		}
		ob_start();
		include($template_path);
		$buffer = ob_get_contents();
		ob_end_clean();
		echo $buffer;
		exit();
	}
}
?>