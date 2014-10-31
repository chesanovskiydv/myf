<?php 

class ArrayAssistant
{
	private static $_loader;
	//private static $_loader=array();;
		
	public function FileToArray($filename)
	{
	$filename = dirname(__FILE__).$filename;
		$f=fopen($filename,"rt");	
		$j=0;
		while(!feof($f))
		{
			$ar[$j]=fgets($f);
			$ar[$j]=substr($ar[$j], 0, strlen($ar[$j])-1);
			$j++;
		}
		fclose($f);
		
		return $ar;
	}
		
	public function saveArrayToFile($array)
	{
	
	}
	/*
	public static function init()
	{		
		if (self::$_loader == NULL) {
			self::$_loader = new self();
		}
		return self::$_loader;
	}
	*/
	
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