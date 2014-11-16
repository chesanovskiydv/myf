<?php 
/**
 * Класс для чтения файла в массив и сохранения массива в фаил
 *
 * @var array $dataArray Текущий массив
 * @var bool $rewrite Перезаписать фаил
 */
class ArrayLoadSaver
{
	private static $_loader;

	protected $dataArray;
	protected $rewrite;
	
	function __construct($ar=null, $rewrite = false)
	{
        $this->dataArray=$ar;
		$this->setRewrite($ar);
	}

	public function setRewrite($rewrite)
	{
		$this->rewrite=$rewrite;
		return $this;
	}
	
	public function getArray()
	{
		return $this->dataArray;
	}
	
/**
 * метод для преобразования данных из файла в массив
 *
 * @param string $filename Название файла
 * @return $this
 */
	public function FileToArray($filename)
	{
		if($filename[0]=='/')
		{
			$filename = substr($filename,1);
	//		$filename = dirname(__FILE__).'/'.$filename;
		}
		try{
			if(!file_exists($filename))
			{
				throw new Exception("This file does not exist: \"$filename\"");
			}
		}catch (Exception $e) {
			echo "Error : ".$e->getMessage(), "\n";
			return false;
		}	
		$f=fopen($filename,"rt")  or die ( "Can't open the file $filename" );	
		$j=0;
		while(!feof($f))
		{
			$ar[$j]=fgets($f);
			$ar[$j]=substr($ar[$j], 0, strlen($ar[$j])-1);
			$j++;
		}
		fclose($f);
        $this->dataArray=$ar;
		return $this;
	}
	
/**
 * метод для сохранения массива в фаил
 *
 * @param string $filename Название файла
 * @param array $dataArray Текущий массив
 * @param bool $rewrite Перезаписать фаил
 * @return $this
 */
	public function saveArrayToFile($filename,$ar=null,$rewrite=null)
	{
		if(isset($rewrite))
		{
			$this->rewrite = $rewrite;
		}
		if(isset($ar))
		{
			$this->dataArray = $ar;
		}
		if($filename[0]=='/')
		{
			$filename = substr($filename,1);
	//		$filename = dirname(__FILE__).'/'.$filename;
		}
		try {
			if($this->rewrite)
			{
				$handle = fopen($filename, 'a');
			}
			else
			{
				$handle = fopen($filename, 'w');
			}
			 if (!$handle) throw new Exception("Can't open the file \"$filename\"");
		}
		catch (Exception $e) {
			  //	echo 'Error: ',  $e->getMessage(), "\n";
			echo "Error (File: ".$e->getFile().", line ".
					$e->getLine()."): ".$e->getMessage(), "\n";
			return false;
		}
		foreach($this->dataArray as $value)
		{
			fwrite($handle, $value."\r\n");
		}
		fclose($handle);
		return $this;
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