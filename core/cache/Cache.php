<?php 
Class Cache
{
	public static function getCache($var)
	{
		$CacheVar=MySQL::init()->sqlSelect(array(
            'columns' => "*", 
            'table' => 'cache',  
	 		'nameParam' => 'var_name',
            'valParam' => $var,
	 		'sign' => "=",
			)
		);
		if(!isset($CacheVar[0]))
		{
			return null;
		};
		$createTime = $CacheVar[0]['create_time'];
		$timestamp = strtotime($createTime);
		$liveTime = isset($CacheVar[0]['storage_time']) ? $CacheVar[0]['storage_time'] : Config::getCacheTime();
		if(time()<($timestamp+$liveTime))
		{
			return $CacheVar[0]['var_value'];
		}
		else
		{
			MySQL::init()->sqlDelete(array(
					'table' => 'cache', 
					'whereParam' => 'id', 
					'whereVal' => $CacheVar[0]['id'], 
				)
			);
			return null;
		};
		return true;
	}
	
	public static function setCache($var_name, $var_value, $liveTime=null)
	{
	$tmp =MySQL::init()->sqlSelect(array(
            'columns' => "*",
            'table' => 'cache', 
	 		'nameParam' => 'var_name',
            'valParam' => $var_name,
	 		'sign' => "=",
        )
	);
	if(isset($tmp))
	{
		MySQL::init()->sqlDelete(array(
					'table' => 'cache', 
					'whereParam' => 'id',
					'whereVal' => $tmp[0]['id'], 
				)
		);
	}
		if(isset($liveTime))
		{
			MySQL::init()->sqlInsert(array(
				'table' => 'cache', 
				'columns' => "var_name,var_value,storage_time", 
				'values' => "'$var_name', '$var_value', '$liveTime'", 
				)
			);
		}
		else
		{
			MySQL::init()->sqlInsert(array(
					'table' => 'cache', 
					'columns' => "var_name,var_value", 
					'values' => array($var_name, $var_value), 
				)
			);
		}
		return false;
	}
}
?>