<?php
class Localize {

	public static function setLocal($loc)
	{
		$_SESSION['localize']=$loc;
	}
	
	public static function getLocal()
	{
		return isset($_SESSION['localize']) ? $_SESSION['localize'] : Config::init()->getLocal();
	}
	
	public static function t($var)
	{
		$pathTOfile = __DIR__.'/../../application/localize/'.self::getLocal().'/translate.json';
		if(file_exists($pathTOfile))
		{
			$fileContents=file_get_contents($pathTOfile);
			$words = json_decode($fileContents, true);
			if(func_num_args()>1)
			{
				for($arg=1;$arg<func_num_args();$arg++)
				{
					$words[$var] = str_replace('$var_'.$arg, func_get_arg($arg), $words[$var]);
				}
			}
			return isset($words[$var]) ? $words[$var] : null;
		}
		else
		{
			return null;
		}
	}
	
	public static function echoT($var=null)
	{
		echo self::t($var);
	}
}
?>