<?php
require_once 'GetContent.php';
/**
 * Parser - класс который получает ссылку и фаил с прокси, возвращает контент страницы и перезаписывает фаил удаляя не работающие прокси.
 * для работы необходим curl
 *
 * 
 */
class Parser 
{
	private static $_loader;
	
	/**
	  * Функция которая получает контент страницы и удаляет нерабочие прокси и входного файла с прокси, если он есть
	  *
	  * @param string $url Сылка
	  * @param string $proxyFile фаил с прокси
	  * @return контент страницы
	  */
	public function startParse($url, $proxyFile=null)
	{
		$proxyArray=null;
		if(isset($proxyFile) && !empty($proxyFile))
		{
			$proxyArray = ArrayAssistant::init()->FileToArray($proxyFile)->getArray();
			ArrayAssistant::init()->saveArrayToFile($proxyFile,$proxyArray,false);
		}
		$getContent = new GetContent;
	//	foreach($arrayOfUrl as $url)
	//	{
		/*	if(isset($ContentObj))
			{
				$proxyArray = $ContentObj->getProxy();
			}*/
			
			try{
				$Content = $getContent->parseContent($url, $proxyArray);
				if(!$Content)
				{
					throw new Exception("Proxy ended or No content");
				}
				elseif(isset($proxyFile))
				{
					ArrayAssistant::init()->saveArrayToFile($proxyFile,$proxyArray,false);
				}
			}
			catch (Exception $e) {
							echo "Error : ".$e->getMessage(), "\n";
							exit;
					}	
			//TODO: парсинг $Content ?
	//		$content[] = $Content;
			//
	//	}
		return $Content;
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
//TODO: При пустом файле проксиков, exeptions
//$a = new Parser;
//$url = array('https://ru.wikipedia.org/wiki/CURL', 'https://ru.wikipedia.org/wiki/%D0%A0%D0%B5%D0%B7%D0%B8%D0%B3,_%D0%94%D0%B6%D0%BE%D0%BD');
//$b = $a->startParse('https://ru.wikipedia.org/wiki/CURL');
//$b = $a->startParse('http://www.google.com/');
//echo $b;
/*
foreach($b as $val)
{
	echo $val;
}
*/
?>