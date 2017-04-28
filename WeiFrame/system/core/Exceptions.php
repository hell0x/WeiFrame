<?php
class Wei_Exceptions{

	//缓冲嵌套级别
	public $ob_level;

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
		return $buffer;
	}

	public function show_404($template, $message){
		echo $this->show_error($message, 404, $template, $heading);
		exit();
	}
}
?>