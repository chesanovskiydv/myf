<?php 
/**
 * Класс для чтения файла в массив и сохранения массива в фаил
 *
 * @param string $filename Название файла
 * @param array $dataArray Текущий массив
 * @param bool $rewrite Перезаписать фаил
 */
class ArrayAssistant
{
	private static $_loader;

	protected $filename;
	protected $dataArray;
	protected $rewrite;
	
	function __construct($filename=null, $ar=null, $rewrite = false)
	{
		$this->setFilename($filename);
		$this->setArray($ar);
		$this->setRewrite($ar);
	}
	
	public function setFilename($filename)
	{
		$this->filename=$filename;
		return $this;
	}
	
	public function setArray($ar)
	{
		$this->dataArray=$ar;
		return $this;
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
 * Функция для преобразования данных из файла в массив
 *
 * @param string $filename Название файла
 * @return $this
 */
	public function FileToArray($filename=null)
	{
		if(isset($filename))
		{
			$this->filename = $filename;
		}
		$filename = dirname(__FILE__).$this->filename;
		$f=fopen($filename,"rt");	
		$j=0;
		while(!feof($f))
		{
			$ar[$j]=fgets($f);
			$ar[$j]=substr($ar[$j], 0, strlen($ar[$j])-1);
			$j++;
		}
		fclose($f);
		
		$this->setArray($ar);
		return $this;
	}
	
/**
 * Функция для сохранения массива в фаил
 *
 * @param string $filename Название файла
 * @param array $dataArray Текущий массив
 * @param bool $rewrite Перезаписать фаил
 * @return $this
 */
	public function saveArrayToFile($filename=null,$ar=null,$rewrite=null)
	{
		if(isset($rewrite))
		{
			$this->rewrite = $rewrite;
		}
		if(isset($ar))
		{
			$this->dataArray = $ar;
		}
		if(isset($filename))
		{
			$this->filename = $filename;
		}
		$filename = dirname(__FILE__).$this->filename;
		try {
			if($this->rewrite)
			{
				$handle = fopen($filename, 'a');
			}
			else
			{
				$handle = fopen($filename, 'w');
			}
			 if (!$handle) throw new Exception("Could not open the file!");
			foreach($this->dataArray as $value)
			{
				fwrite($handle, $value."\r\n");
			}
			fclose($handle);
		} 
			catch (Exception $e) {
			  //	echo 'Error: ',  $e->getMessage(), "\n";
			  echo "Error (File: ".$e->getFile().", line ".
         $e->getLine()."): ".$e->getMessage(), "\n";
				//return false;
		}
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