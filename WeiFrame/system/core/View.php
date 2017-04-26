<?php
class Wei_View{

	//模板变量
	public $vars = array();
	//配置
	private $config;

	public function __construct(Array $vars = array()){
		$this->config = &get_config();

		if(!is_dir($this->config['cache_path']) || !is_dir($this->config['view_path'])){
			exit('the dicectory not exists');
		}
		foreach($vars as $key => $val){
			$this->vars[$key] = $val;
		}
	}

	public function display($tpl){
		extract($this->vars);
		$view_path = $this->config['view_path'].$tpl.'.php';
		$cache_path = $this->config['cache_path'].$tpl.'.php';
		if(!file_exists($view_path)){
			exit($view_path.'does not exist');
		}
		if($this->config['auto_cache']){
			if(file_exists($cache_path)){
				if(filemtime($cache_path) >= filemtime($view_path)){
					return require_once($cache_path);
				}
			}else{
				ob_start();
				require_once($view_path);
				file_put_contents($cache_path, ob_get_contents());
				ob_end_flush();
			}
		}
	}
}
?>