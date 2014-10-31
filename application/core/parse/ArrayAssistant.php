<?php 

class ArrayAssistant
{
	private static $_loader;
		
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
		
	public function saveArrayInFile($array)
	{
	
	}
	
	public static function init()
	{		
		if (self::$_loader == NULL) {
			self::$_loader = new self();
		}
		return self::$_loader;
		
	}
}

//$a = new ProxyAssistant;
//$b=$a->FileToArray('\\proxy\\testproxy.txt');
//$b=ArrayAssistant::init()->FileToArray('\\proxy\\testproxy.txt', $w);
//print_r($b);

?>