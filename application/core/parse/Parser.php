<?php
require_once 'ArrayAssistant.php';
require_once 'GetContent.php';

class Parser 
{
	private static $_loader;
	
	public function startParse($arrayOfUrl, $proxyFile=null)
	{
		$proxyArray=null;
		if(isset($proxyFile))
		{
			$proxyArray = ArrayAssistant::init()->FileTOArray($proxyFile)->getArray();
			ArrayAssistant::init()->saveArrayToFile($proxyFile,$proxyArray,false);
		}
		$getContent = new GetContent;
		foreach($arrayOfUrl as $url)
		{
			try{
				$content = $getContent->parseContent($url, $proxyArray);
				if(!content)
				throw new Exception("Proxy ended");
			}
			catch (Exception $e) {
							echo "Error : ".$e->getMessage(), "\n";
							exit;
					}						
		}
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