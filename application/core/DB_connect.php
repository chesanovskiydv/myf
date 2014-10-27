<?php
//Класс для соединения с БД
class DB_Connect {

	protected $db;
    // Конструктор, соединяется с БД
    protected function __construct($db=NULL, $db_type='mysql')
	{
		if(is_object($db))
		{
			$this->db = $db;
		}
		else
		{
            $dsn = $db_type.":host=".Config::getDB_conf('DB_HOST').";dbname=".Config::getDB_conf('DB_NAME');
			try
			{
                $this->db = new PDO($dsn, Config::getDB_conf('DB_USER'), Config::getDB_conf('DB_PASS'));
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
    
}

?>