<?php
class index extends Wei_controller{

	public function __construct(){}

	public function index(){
		$db = $this->database();
		$data['name'] = 'weis';
		// $data['province'] = 'suizhou';
		// $data['year'] = 22;
		// echo $db->driver->insert('wei', $data);
		// echo $db->driver->update('wei', $data, "where id=8");
		// $db->driver->delete('wei', "where id=8");
		$result = $db->driver->select('wei', array('name', 'province'), "where id=9");
		echo "<pre>";
		print_r($aresult);
		echo "</pre>";
	}
}
?>