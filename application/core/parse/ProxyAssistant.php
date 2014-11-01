<?php 
require_once 'ArrayAssistant.php';

class ProxyAssistant extends ArrayAssistant
{	

	protected $options = array(
							'checkProxies' => true,
							);
	
	public function FileToArray($filename=null, $options=null)
	{
	if(isset($filename))
	{
		$this->filename = $filename;
	}
		$ar = parent::FileToArray($this->filename);

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
	/*
	public function saveArrayInFile($array)
	{
	
	}
	*/
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
		return parent::init($className);
	}
}

$w= array(
	'checkProxies' => false,
	);
	
//$a = new ProxyAssistant;
//$b=$a->FileToArray('\\proxy\\testproxy.txt');

//print_r(ProxyAssistant::init()->setFilename('\\proxy\\teeee.txt'));
/*
$b=ProxyAssistant::init()->FileToArray('\\proxy\\testproxy.txt');
print_r($b);
*/
/*
$b=ArrayAssistant::init()->FileToArray('\\proxy\\testproxy.txt');
print_r($b);
*/
//$b=ArrayAssistant::init()->saveArrayToFile(array('dsfsdf','sdfg343'),'\\proxy\\teeee.txt');
$b=ArrayAssistant::init()->setFilename('\proxy\testproxy.txt')->FileToArray()->setFilename('proxy\teeee.txt')->saveArrayToFile(null,null,true);
//$b=ProxyAssistant::init()->setFilename('\\proxy\\teeee.txt')->setArray(array('qqqq3','wwww3'))->setRewrite(true)->saveArrayToFile(null,null,true);
print_r($b);
?>