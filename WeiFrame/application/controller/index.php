<?php
class index extends Wei_controller{

	public function __construct(){}

	public function index(){
		echo 'start';
		$db = $this->database();
		echo $db->driver->insert('wei', array('name'=>'xing'));
	}
}
?>