<?php
namespace core;   //定义命名空间

use core\Config;   //使用配置类
use core\Router;   //使用路由类

/**
 * 框架启动类
 */
class Application{

	public static $router;

	//启动
	public static function run(){
		self::$router = new Router();   //实例化路由类
		self::$router->setUrlType(Config::get('url_type'));   //读取配置并设置路由类型
		$url_array = self::$router->getUrlArray();   //获取经过路由类处理生成的路由数组
		self::dispatch($url_array);
	}

	//路由分发
	public static function dispatch($url_array=[]){
		$module = '';
		$controller = '';
		$action = '';
		if(isset($url_array['module'])){
			$module = $url_array['module'];
		}else{
			$module = Config::get('default_module');
		}
		if(isset($url_array['controller'])){   //若路由中存在 controller，则设置当前控制器，首字母
			$controller = ucfirst($url_array['controller']);
		}else{
			$controller = ucfirst(Config::get('default_controller'));
		}
		//拼接控制器文件路径
		$controller_file = APP_PATH.$module.DS.'controller'.DS.$controller.'Controller.php';

		if(isset($url_array['action'])){
			$action = $url_array['action'];
		}else{
			$action = Config::get('default_action');
		}

		//判断控制器文件是否存在
		if(file_exists($controller_file)){
			require $controller_file;   //引入该控制器
			$className = 'module\controller\IndexController';   //命名空间字符串示例
			$className = str_replace('module', $module, $className);   //使用字符串替换功能，替换对应的模块名和控制器名
			$className = str_replace('IndexController', $controller.'Controller', $className);
			$controller = new $className;   //实例化具体的控制器
			//判断访问的方法是否存在
			if(method_exists($controller, $action)){
				$controller->setTpl($action);   //设置方法对应的视图模板
				$controller->$action();
			}else{
				die('The method does not exist');
			}
		}else{
			die('The controller does not exist');
		}
	}
}
?>