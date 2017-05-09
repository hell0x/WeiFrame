<?php
class Wei_DB{

	//获取配置
	private $dbconfig;

	//驱动
	public $driver;

	public function __construct(){
		$this->dbconfig = &get_config('database');
		switch ($this->dbconfig['dbdriver']){
			case 'mysql':
				echo 'mysql';
				break;
			case 'mysqli':
				echo 'mysqli';
				break;
			case 'pdo':
				require_once(SYS_PATH.'database'.DS.'db_pdo.php');
				$this->driver = new db_pdo();
				break;
			default:
				echo 'default';
		}
	}
}
?>