<?php
class Wei_Router{
	
	public function __construct(){
		$URI = &load_class('URI', 'core');
		$controller = $URI->segments['controller'];
		$action = $URI->segments['action'];
		$param = $URI->segments['param'];
		//调用控制器文件
		$controller_path = APP_PATH.'controller'.DS.$controller.'.php';
		if(!file_exists($controller_path)){
			show_404();
		}
		require_once($controller_path);
		//实例化控制器
		$dispatch = new $controller();
		if ((int)method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $param);
        } else {
            show_404('error_404', $controller.'/'.$action.' was not Found');
        }
	}	
}
?>