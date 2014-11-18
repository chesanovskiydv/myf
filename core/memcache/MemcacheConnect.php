<?php 
class MemcacheConnect {

	private static $_loader;
	protected $memcache_obj;
    // Конструктор соединяется с memcache
    protected function __construct($memcache_obj=NULL, $host='127.0.0.1', $port=11211)
	{
		if(is_object($memcache_obj))
		{
			$this->memcache_obj = $memcache_obj;
		}
		else
		{
			$this->memcache_obj = new Memcache;
			try
			{
				if(!$this->memcache_obj->connect('127.0.0.1', 11211))
				throw new Exception("Could not connect to memcached server");
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
	
	function __destruct()
	{
		$this->memcache_obj->close();
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