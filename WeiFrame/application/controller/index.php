<?php
class index extends Wei_controller{

	public function __construct(){}

	public function index(){
		$db = $this->database();
		$data['name'] = 'weis';
		// $data['province'] = 'suizhou';
		// $data['year'] = 22;
		// echo $db->driver->insert('wei', $data);
		echo $db->driver->update('wei', $data, "where id=8");
	}
}
?>