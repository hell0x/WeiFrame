<?php
class welcome extends Wei_controller{

	public function index($str){
		header("Content-type:text/html;charset=utf-8");
		// var_dump('welcome');
		$this->assign('name', $str);
		$this->display('welcome');
	}
}
?>