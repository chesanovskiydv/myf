<?php
class Localize {

	public static function setLocal($loc)
	{
		$_SESSION['localize']=$loc;
	}
	
	public static function getLocal()
	{
		return isset($_SESSION['localize']) ? $_SESSION['localize'] : Config::getLocal();
	}
	
	public static function t($var=null)
	{
		$pathTOfile = __DIR__.'/'.self::getLocal().'/translate.json';
		if(file_exists($pathTOfile))
		{
			$fileContents=file_get_contents($pathTOfile);
			$words = json_decode($fileContents, true);
			return $words[$var];
		}
		else
		{
			echo "Файла для такой локали нет";
		}
	}
}
?>