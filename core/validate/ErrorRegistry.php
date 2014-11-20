<?php 
class ErrorRegistry
{
	private static $_errors = array();

	public function __construct() {}

	public static function set($key, $var)
	{
	/*
		try{
			if (isset(self::$_errors[$key])) 
			{
				throw new Exception( Localize::t('exeptionRegistry_1') . $key . Localize::t('exeptionRegistry_2'));
			}
		} catch (Exception $e) {
			echo "Error : ".$e->getMessage(), "\n";
			return false;
		}
	*/					
								
		self::$_errors[$key][] = $var;
		return true;
	}

	public static function get($key=null)
	{
		if(!isset($key))
		{
			if(!empty(self::$_errors))
			{
				return self::$_errors;
			}
			return null;
		}
		elseif (!isset(self::$_errors[$key])) 
		{ 
			return null;
		}
		return self::$_errors[$key];
	}

	public static function remove($key)
	{
		unset(self::$_errors[$key]);
	}
}