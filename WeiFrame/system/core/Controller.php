<?php
class Wei_controller{

	protected $vars = array();		//模板变量
	protected $tpl;					//视图模板

	public function __construct(){
		
	}

	//变量赋值函数
	final protected function assign($name, $value=''){
		//如果$name是数组
		if(is_array($name)){
			$this->vars = array_merge($this->vars, $name);
		}else{
			$this->vars[$name] = $value;
		}
	}

	//设置模板
	final protected function setTpl($tpl){
		$this->tpl = $tpl;
	}

	//模板展示
	final protected function display($tpl){
		$view = &load_class('View', 'core', $this->vars);
		$view->display($tpl);
	}

	//数据库初始化
	protected function database(){
		$db = &load_class('DB', 'database');
		return $db;
	}
}
?>