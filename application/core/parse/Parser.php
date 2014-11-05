<?php
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
			if(isset($ContentObj))
			{
				$proxyArray = $ContentObj->getProxy();
			}
			try{
				$ContentObj = $getContent->parseContent($url, $proxyArray);
				if(!$ContentObj)
				{
					throw new Exception("Proxy ended");
				}
				elseif(isset($proxyFile))
				{
					ArrayAssistant::init()->saveArrayToFile($proxyFile,$ContentObj->getProxy(),false);
				}
			}
			catch (Exception $e) {
							echo "Error : ".$e->getMessage(), "\n";
							exit;
					}	
			//TODO: парсинг $ContentObj->getContent() ?
			$content[] = $ContentObj->getContent();
			//
		}
		return $content;
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
$a = new Parser;
$url = array('https://ru.wikipedia.org/wiki/CURL', 'https://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%B7%D0%B8%D0%B3,_%D0%94%D0%B6%D0%BE%D0%BD');
$b= $a->startParse($url,'\proxy\teeee.txt');
foreach($b as $val)
{
echo $val;
}
?>