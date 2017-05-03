<?php
class db_pdo{

	//数据库句柄
	private $_db;
	//SQL语句
	private $_sql;
	//数据库配置
	private $dbconfig;

	public function __construct(){
		$this->dbconfig = &get_config('database');

		//连接数据库
		$this->_db = new PDO("mysql:host={$this->dbconfig['hostname']};dbname={$this->dbconfig['dbname']}", $this->dbconfig['username'], $this->dbconfig['password']);
		$this->_db->setAttribute(PDO::ATTR_PERSISTENT, true); // 设置数据库连接为持久连接
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // 设置抛出错误
    	$this->_db->setAttribute(PDO::ATTR_ORACLE_NULLS, true); // 设置当字符串为空转换为 SQL 的 NULL
    	$this->_db->query('SET NAMES utf8'); // 设置数据库编码
    }

    public function index(){
		var_dump($this->_db);
	}
}
?>