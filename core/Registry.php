<?php 
class Registry
{
	private static $_vars = array();

	public function __construct() {}

	public static function set($key, $var)
	{
		try{
			if (isset(self::$_vars[$key]) == true) {
				throw new Exception('Данная переменная [' . $key . '] уже существует!');
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
		if (isset(self::$_vars[$key]) == false) { return null; }
		return self::$_vars[$key];
	}

	public static function remove($var)
	{
		unset(self::$_vars[$key]);
	}
}
?>