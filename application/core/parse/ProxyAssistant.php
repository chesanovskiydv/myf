<?php 
require_once 'ArrayAssistant.php';

class ProxyAssistant extends ArrayAssistant
{
	private static $_loader;
	
	protected $options = array(
							'checkProxies' => true,
							);
	
	public function FileToArray($filename, $options=null)
	{
		$ar = parent::FileToArray($filename);

		if(isset($options['checkProxies']) ? $options['checkProxies'] : $this->options['checkProxies'])
		{
			return $this->checkProxy($ar);
		}
		return $ar;
	}
	
	public function checkProxy($proxy)
	{
		$proxyRegExp ='/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}:[0-9]+/';
		if(is_array($proxy))
		{
			foreach($proxy as $key=>$value)
			{
				if(!preg_match($proxyRegExp,$value))
				unset($proxy[$key]);  
			}
			return array_values($proxy);
		}
		else
		{
			return preg_match($proxyRegExp,$proxy) ? $proxy : false;    
		}
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
$w= array(
	'checkProxies' => false,
	);
//$a = new ProxyAssistant;
//$b=$a->FileToArray('\\proxy\\testproxy.txt');
$b=ProxyAssistant::init()->FileToArray('\\proxy\\testproxy.txt', $w);
print_r($b);
$b=ProxyAssistant::init()->FileToArray('\\proxy\\testproxy.txt');
print_r($b);

?>