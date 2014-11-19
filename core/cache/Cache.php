<?php 
class Cache
{
	private $_cache;
   
   public function __construct(iCache $cache)
	{
		$this->_cache = $cache;
	}

	public function getCache($var)
	{
		return $this->_cache->getCache($var);
	}

	public function setCache($var_name, $var_value, $liveTime=null)
	{
		$this->_cache->setCache($var_name, $var_value, $liveTime);
	}
/*
	public function delete($valueID)
	{
		$this->_cache->delete($valueID);
	}
*/
}
?>