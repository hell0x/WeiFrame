<?php
class welcome extends Wei_controller{

	public function index($str){
		$this->assign('name', $str);
		$this->display('welcome');
	}
}
?>