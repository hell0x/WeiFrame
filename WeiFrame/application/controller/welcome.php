<?php
class welcome extends Wei_controller{

	public function index($str){
		// var_dump('welcome');
		$this->assign('name', $str);
		$this->display('welcome');
	}
}
?>