<?php
//Класс для соединения с БД
class SQLiteConnect {

    // Конструктор, соединяется с БД
    public function __construct($databases='myf', $db=NULL)
	{
		if(Config::init()->getSQLiteconf())
		{
			$databases = Config::init()->getSQLiteconf('DB_NAME');
		}
		if(is_object($db))
		{
			$this->db = $db;
		}
		else
		{
            $dsn = 'sqlite:'.dirname(__FILE__).DIRECTORY_SEPARATOR.'sqlite'.DIRECTORY_SEPARATOR.'databases'.DIRECTORY_SEPARATOR.$databases.'.db';
			try
			{
                $this->db = new PDO($dsn);
			
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
    
}

?>