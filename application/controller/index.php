<?php
class index extends Wei_controller{

	public function __construct(){}

	public function index(){
		// $db = $this->database();
		// $data['name'] = 'weixing';
		// $data['province'] = 'hubei';
		// $data['year'] = 22;
		// echo $db->driver->insert('wei', $data);
		// echo $db->driver->update('wei', $data, "where id=8");
		// $db->driver->delete('wei', "where id=8");
		// $result = $db->driver->select('wei', array('name', 'province'), "where id=9");
		// die;
		// $this->assign('result', $result);
		$this->display('index');
	}

	public function test(){
		$name = input_filter('post.city', '', 'strip_tags,addslashes');
		$age = input_filter('post.age', 0, "intval");
		var_dump($name);
		var_dump($age);
	}
}
?>