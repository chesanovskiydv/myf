<?php 
class RegistrySupport
{
	public static function registryFromConfig()
	{
		$listOfRegistry = Config::init()->getRegistry();
		foreach($listOfRegistry as $key=>$val)
		{
			if(($valToregistry=self::takeRegistry($val))!==null)
			{
				Registry::set($key, $valToregistry);
			}
		}
	}
	
	public static function takeRegistry($var)
	{	
		switch ($var)
		{
			case 'memcache': $return = new Cache(new Myf\Memcache); break;
			case 'dbCache': $return = new Cache(new DbCache); break;
		}
		return $return;
	}
}