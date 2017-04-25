<?php
/**
 * URI  解析地址类
 * 处理传入的地址，将其解析
 */
class Wei_URI {

	//uri参数
	public $segments = array();

	public function __construct(){
		$uri = $this->_parse_uri_string();
	}

	protected function _parse_uri_string(){
		//设置控制器，方法，参数的默认值
		$controller = 'Index';
		$action = 'Index';
		$param = array();

		if(!isset($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME'])){
			return '';
		}
		$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
		$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
		$uri = trim($uri, '/');
		//获取控制器，方法，参数
		if($uri){
			$uriArray = explode('/', $uri);
			$controller = $uriArray[0];
			$action = $uriArray[1];
			for($i=2; $i<count($uriArray); $i+=2){
				$param[$uriArray[$i]] = $uriArray[$i+1];
			}
			$this->segments = compact("controller", "action", "param");
		}else{
			$this->segments = compact("controller", "action", "param");
		}

	}
}
?>