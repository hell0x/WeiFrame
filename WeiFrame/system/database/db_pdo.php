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

    //数据库语句执行函数
    public function query(){
		
	}

	/**
	 * 数据库添加操作
	 * @param  表名称
	 * @param  array 要插入的数据
	 * @return 新插入数据ID
	 */
	public function insert($table, $datas){
		$lastId = array();

		if(empty($datas)){
			show_error("datas is empty");
		}
		
		foreach($datas as $key => $data){
			//防止空数组
			if(empty($key) && empty($data)){
				continue;
			}
			//对$key进行安全过滤
			$column[] = $key;

			switch(gettype($data)){
				case 'NULL':
					$values[] = 'NULL';
					break;
				case 'boolean':
					$values[] = ($data ? '1' : '0');
					break;
				case 'integer':
				case 'double':
				case 'string':
					$values[] = $this->_db->quote($data);
					break;
			}
		}
		$this->_sql = "INSERT INTO `".$table."` (`". implode('`, `', $column) ."`) VALUES(". implode(', ', $values) .")";
		$this->_db->exec($this->_sql);
		$lastId[] = $this->_db->lastInsertId();
		return count($lastId) > 1 ? $lastId : $lastId[0];
	}

	/**
	 * 数据库更新操作
	 * @param  表名称
	 * @param  array 要更新的数据
	 * @param  条件where
	 * @return [type]        [description]
	 */
	public function update($table, $data, $where=null){
		$fields = array();

		if(empty($data)){
			show_error("data is empty");
		}

		foreach($data as $key => $val){
			//防止空数组
				if(empty($key) && empty($data)){
					continue;
				}

			switch(gettype($val)){
				case 'NULL':
					$fields[] = "`".$key."` = NULL";
					break;
				case 'boolean':
					$fields[] = "`".$key."` = " . ($val ? '1' : '0');
					break;
				case 'integer':
				case 'double':
				case 'string':
					$fields[] = "`".$key."` = " . $this->_db->quote($val);
					break;
			}
		}
		$this->_sql = "UPDATE `" . $table . "` SET " . implode(', ', $fields) ." ". $where;
		return $this->_db->exec($this->_sql);
	}

	/**
	 * 数据库更新操作
	 * @param  表名称
	 * @param  array 要更新的数据
	 * @param  条件where
	 * @return [type]        [description]
	 */
	
}
?>