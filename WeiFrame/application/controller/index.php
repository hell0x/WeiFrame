<?php
class index extends Wei_controller{

	public function __construct(){}

	public function index(){
		$db = $this->database();
		$db->driver->index();
	}
}
?>