<?php 
//Работа с конфигами, указываются в application/config/main.php
Class Config {

	private static $_loader;
	private $settings;
	
	function __construct()
	{
		$this->settings = require('/../../application/config/main.php');
		
	}

    public function getMySQLConf($config=null){
        if(isset($config))
        {
            if(isset($this->settings['MySQLConf'][$config]))
            {
                return $this->settings['MySQLConf'][$config];
            }
             else
            {
                return false;
             }
        }
        else
        {
            return $this->settings['MySQLConf'];
        }
    }
	
	public function getRegisterJsScripts($packageName=null)
	{
		return $packageName===null ? array_unique($this->settings['scripts']['js']) : array_unique($this->settings['scripts']['packages'][$packageName]['js']);
	}
	
	public function getRegisterCssScripts($packageName=null)
	{
		return $packageName===null ? array_unique($this->settings['scripts']['css']) :  array_unique($this->settings['scripts']['packages'][$packageName]['css']);
	}
	
	public function getLocal()
	{
		return $this->settings['local'];
	}
	
	public function getCacheTime()
	{
		return $this->settings['CacheTime'];
	}
	
	public function getBannedIp()
	{
		return $this->settings['bannedIp'];
	}
	
	public function getSQLiteconf($config=null)
	{
		 if(isset($config))
        {
            if(isset($this->settings['DbSQLiteConf'][$config]))
            {
                return $this->settings['DbSQLiteConf'][$config];
            }
             else
            {
                return false;
             }
        }
        else
        {
            return $this->settings['DbSQLiteConf'];
        }
	}
	
	public function getComponents()
	{
		return $this->settings['components'];
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