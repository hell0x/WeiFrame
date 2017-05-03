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
	 * //数据库添加操作
	 * @param  表名称
	 * @param  array 要插入的数据
	 * @return [type]        [description]
	 */
	// public function insert($table, $datas){
	// 	$lastIf = array();

	// 	if(!isset($datas[0])){
	// 		show_error("datas is empty");
	// 	}

	// 	foreach($datas as $data){
	// 		$keys = array_keys($data);
	// 		$values = array();
	// 		$column = array();

	// 		foreach()
	// 	}
	// }
	 
	public function insert($table, $datas)
	{
		$lastId = array();

		// Check indexed or associative array
		if (!isset($datas[0]))
		{
			$datas = array($datas);
		}

		foreach ($datas as $data)
		{
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
			// die;
			$keys = array_keys($data);
			$values = array();
			$columns = array();

			foreach ($data as $key => $value)
			{
				array_push($columns, $this->column_quote($key));

				switch (gettype($value))
				{
					case 'NULL':
						$values[] = 'NULL';
						break;

					case 'array':
						preg_match("/\(JSON\)\s*([\w]+)/i", $key, $column_match);

						if (isset($column_match[0]))
						{
							$values[] = $this->quote(json_encode($value));
						}
						else
						{
							$values[] = $this->quote(serialize($value));
						}
						break;

					case 'boolean':
						$values[] = ($value ? '1' : '0');
						break;

					case 'integer':
					case 'double':
					case 'string':
						$values[] = $this->fn_quote($key, $value);
						break;
				}
			}

			// echo 'INSERT INTO "' . $table . '" (' . implode(', ', $columns) . ') VALUES (' . implode($values, ', ') . ')';
			// die;
			$this->exec('INSERT INTO "' . $table . '" (' . implode(', ', $columns) . ') VALUES (' . implode($values, ', ') . ')');

			$lastId[] = $this->_db->lastInsertId();
		}

		return count($lastId) > 1 ? $lastId : $lastId[ 0 ];
	}

	protected function column_quote($string)
	{
		return '"' . str_replace('.', '"."', preg_replace('/(^#|\(JSON\))/', '', $string)) . '"';
	}

	public function quote($string)
	{
		return $this->_db->quote($string);
	}

	protected function fn_quote($column, $string)
	{
		return (strpos($column, '#') === 0 && preg_match('/^[A-Z0-9\_]*\([^)]*\)$/', $string)) ?

			$string :

			$this->quote($string);
	}

	public function exec($query)
	{
		$this->_sql = $query;
		// var_dump($query);
		// die;

		return $this->_db->exec($query);
	}
}
?>