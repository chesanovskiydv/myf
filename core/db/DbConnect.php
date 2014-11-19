<?php
//Класс для соединения с БД
class DbConnect {

	private static $_loader;
	protected $db;
    // Конструктор соединяется с БД
    protected function __construct($db=NULL, $dbType=null, $DbConf=null)
	{
		if(is_object($db))
		{
			$this->db = $db;
		}
		else
		{
            $dsn = $dbType.":host=".$DbConf['DB_HOST'].";dbname=".$DbConf['DB_NAME'];
			try
			{
                $this->db = new PDO($dsn, $DbConf['DB_USER'], $DbConf['DB_PASS']);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
	
	public static function init($className=__CLASS__)
	{
		if(isset(self::$_loader[$className]))
			return self::$_loader[$className];
		else
		{
			return self::$_loader[$className]=new $className();
		}
	}
    
}

?>