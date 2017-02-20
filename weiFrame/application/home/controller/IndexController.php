<?php
namespace home\controller;

use core\Controller;
/**
 * index控制器
 */
class IndexController extends Controller{
	
	public function index(){
		$this->assign('name', 'weixing---home');
		$this->display();
	}
}
?>