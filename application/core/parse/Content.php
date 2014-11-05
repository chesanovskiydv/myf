<?php

class Content 
{
	
	public $content;
	public $proxyArray = array();
	
	function __construct($content=null,$proxyArray=null)
	{
		if(isset($content))
		{
			$this->setContent($content);
		}
		if(isset($proxyArray))
		{
			$this->setProxy($proxyArray);
		}
	}
	
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
		public function setProxy($proxyArray)
	{
		$this->proxyArray = $proxyArray;
	}
	
	public function getProxy()
	{
		return $this->proxyArray;
	}

}
?>