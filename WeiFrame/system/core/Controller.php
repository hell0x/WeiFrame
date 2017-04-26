<?php
class Wei_controller{

	protected $vars = array();		//模板变量
	protected $tpl;					//视图模板

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
		require_once BASEPATH.'View.php';
		$view = new Wei_View($this->vars);
		die;
		$view->display($tpl);
	}
}
?>