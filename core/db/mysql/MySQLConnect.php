<?php
//Класс для соединения с MySQL
abstract class MySQLConnect extends DbConnect
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
	
	abstract public function sqlSelect($array);
	abstract public function sqlInsert($array);
	abstract public function sqlUpdate($array);
	abstract public function sqlDelete($array);
}