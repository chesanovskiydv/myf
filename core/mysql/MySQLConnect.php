<?php
//Класс для соединения с MySQL
class MySQLConnect extends DbConnect
{

	protected $db;

    protected function __construct($db=NULL)
	{
		if(is_object($db))
		{
			parent::__construct($db);
		}
		else
		{
			$DbConf=Config::getMySQLConf();
			parent::__construct(null, 'mysql', $DbConf);
		}
	}
    
}

?>