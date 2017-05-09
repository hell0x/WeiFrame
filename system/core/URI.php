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
		$controller = 'index';
		$action = 'index';
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
			$action = isset($uriArray[1]) ? $uriArray[1] : 'index';
			if(count($uriArray)%2 === 0){
				for($i=2; $i<count($uriArray); $i+=2){
					$param[$uriArray[$i]] = $uriArray[$i+1];
				}
			}else{
				show_error("URI参数有误");
			}
			$this->segments = compact("controller", "action", "param");
		}else{
			$this->segments = compact("controller", "action", "param");
		}

	}
}
?>