<?php 
class Registry
{
	private static $_vars = array();

	public function __construct() {}

	public static function set($key, $var)
	{
		try{
			if (isset(self::$_vars[$key])) 
			{
				throw new Exception( Localize::t('exeptionRegistry_1') . $key . Localize::t('exeptionRegistry_2'));
			}
		} catch (Exception $e) {
			echo "Error : ".$e->getMessage(), "\n";
			return false;
		}
								
								
		self::$_vars[$key] = $var;
		return true;
	}

	public static function get($key)
	{
		if (!isset(self::$_vars[$key])) 
		{ 
			return null; 
		}
		return self::$_vars[$key];
	}

	public static function remove($key)
	{
		unset(self::$_vars[$key]);
	}
}