<?php 
require_once 'ArrayAssistant.php';
require_once 'Content.php';
/**
 * GetContent - класс для получения контента страницы.
 * для работы необходим curl
 *
 * @param array $proxyArray
 * @param array $AppSetings
 * @param array $curlOptions
 * 
 */
class GetContent
{
	private static $_loader;
 
	protected $AppSetings;
	protected $curlOptions;

	private $curlSession;

	function __construct()
	{
		//конфиги CUrl
		$this->curlOptions = require('config/CurlConfig.php');
		//Конфиги приложения
		$this->AppSetings = require('config/AppConfig.php');
		//$this->curlOptions[CURLOPT_URL]=$URL;
	}
	
	protected function setCurlOptions($proxy=null)
	{
		foreach($this->curlOptions as $key=>$value)
		{
			curl_setopt($this->curlSession, $key, $value);
		}
		if(isset($proxy))
		curl_setopt($this->curlSession, CURLOPT_PROXY, $proxy);
	}
	
	public function parseContent($url, $proxyArray=null)
	{
		$this->curlOptions[CURLOPT_URL]=$url;
		//номер текущего прокси
		$j=0;
		$countOfProxy = count($proxyArray);
		do{
			$proxy = isset($proxyArray) ? $proxyArray[$j] : null;
			//счетчик попыток
			$iterator=0;
			do
			{
				$this->curlSession = curl_init();
				$this->setCurlOptions($proxy);
				//curl_exec - выполняет CURL-сессию.
				try {
					if(!isset($this->curlOptions[CURLOPT_URL]))
					throw new Exception('Not specified url.');
				} catch (Exception $e) {
					 echo 'Error: ',  $e->getMessage(), "\n";
					 return false;
				}
				$returnContent=curl_exec($this->curlSession);
				if($this->AppSetings['showError'])
				{
					echo "\n".curl_error($this->curlSession); 
				}
				//echo $returnContent;
				$code=curl_getinfo($this->curlSession,CURLINFO_HTTP_CODE );
				if($this->AppSetings['showInfo'])
				{
					foreach($this->AppSetings['info'] as $key=>$value)
					{
						if($value[0])
						{
							echo $value[1].curl_getinfo($this->curlSession,$key ).$value[2];
						}
					}
				}
				if($this->AppSetings['showContent'])
				{
					echo $returnContent;
				}
				curl_close($this->curlSession);
				$iterator++;
			}
			while($code!='200' && $iterator!==$this->AppSetings['numberOfRetries']);
			if($code!='200')
			{
				unset($proxyArray[$j]);
			}
			$j++;
		}while($code!='200' && $j<$countOfProxy);
		//возвращать только страницы с HTTP указаными в конфиге
		if(in_array($code, $this->AppSetings['returnPageHTTP']))
		{
			return new Content($returnContent,array_values($proxyArray));
		}
		else
		{
			return false;
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
/*

$arrayOfProxy=ArrayAssistant::init()->FileToArray('\proxy\teeee.txt')->getArray();
$ContentObj=GetContent::init()->parseContent('https://ru.wikipedia.org/wiki/CURL', $arrayOfProxy);
if($ContentObj)
{
	//ArrayAssistant::init()->saveArrayToFile('\proxy\teeee.txt',$ContentObj->getProxy(),false);
}
$content=$ContentObj->getContent();
//TODO дальше после получения контента и сохранения оставшихся прокси
//echo $k;
echo "<pre>";
print_r($ContentObj->getProxy());
echo "</pre>";
$qq=GetContent::init()->parseContent('https://ru.wikipedia.org/wiki/CURL', $ContentObj->getProxy());

*/
?>