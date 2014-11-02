<?php 
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

	protected $proxyArray;  
	protected $AppSetings;
	protected $curlOptions;

	private $curlSession;

	function __construct($URL=null, $proxyArray=null)
	{
		$this->proxyArray = $proxyArray; //??
		//конфиги CUrl
		$this->curlOptions = require('config/CurlConfig.php');
		//Конфиги приложения
		$this->AppSetings = require('config/AppConfig.php');
		$this->curlOptions[CURLOPT_URL]=$URL;
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
	
	public function parseContent($url=null, $proxyArray=null)
	{
	if(isset($proxyArray))
	{
		$this->proxyArray = $proxyArray;
	}
		if(isset($url))
		{
			$this->curlOptions[CURLOPT_URL]=$url;
		}
		//номер текущего прокси
		$j=0;
		do{
			$proxy = isset($this->proxyArray) ? $this->proxyArray[$j] : null;
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
			$j++;
		}while($code!='200' && $j<count($this->proxyArray));
		//возвращать только страницы с HTTP указаными в конфиге
		if(in_array($code, $this->AppSetings['returnPageHTTP']))
		{
			return $returnContent;
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
//echo GetContent::init('https://ru.wikipedia.org/wiki/CURL', '116.0.1.129:8080', 5)->parseContent();

//$qqqqq = array('152.26.53.5:80','195.209.100.4:3128','94.228.205.2:8080');
//GetContent::init()->parseContent('https://ru.wikipedia.org/wiki/CURL', $qqqqq);
GetContent::init()->parseContent('https://ru.wikipedia.org/wiki/CURL');

//GetContent::init()->parseContent('https://ru.wikipedia.org/wiki/FTP12');
/*
$qqqqq1 = array('152.26.53.5:80');
$a = new GetContent('https://ru.wikipedia.org/wiki/CURL',$qqqqq1);
$a->parseContent('https://ru.wikipedia.org/wiki/CURL',$qqqqq);

$b = new GetContent;
$b->parseContent('https://ru.wikipedia.org/wiki/FTP');
*/
?>