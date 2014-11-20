<?php
//Класс для соединения с MySQL
class MySQLConnect extends DbConnect
{
	
    protected function __construct($db=NULL)
	{
		if(is_object($db))
		{
			parent::__construct($db);
		}
		else
		{
			$DbConf=Config::init()->getMySQLConf();
			parent::__construct(null, 'mysql', $DbConf);
		}
	}
	    
	public static function init($className=__CLASS__)
	{
		return parent::init($className);
	}
}

?>