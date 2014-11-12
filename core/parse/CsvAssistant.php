<?php
/**
 * Класс для записи данных в csv
 *
 */
class CsvAssistant
{
	private static $_loader;
   /**
	 * Функция сохранения массива в csv, элемент = строка
	 *
	 * @param string $fileName Название файла
	 * @param array $data Массив с данными
	 * @param bool $rewrite Дозапись
	 * @return $this
	 */
	public function saveCsvFile($fileName,$data, $rewrite=true)
	{
		$CSVFileStream = $this->OpenCsvFile($fileName,$rewrite);
		$this->WriteCsvFile($CSVFileStream,$data);
		$this->CloseCsvFile($CSVFileStream);
	}
	
	// Открывает Csv фаил врзвращая поток на него
	protected	function OpenCsvFile($fileName, $rewrite)
	{
		if($rewrite){
			$CSVFileStream=fopen($fileName,"at");
		}
		if(!$rewrite){
			$CSVFileStream=fopen($fileName,"wt");
		}
		return $CSVFileStream;
	}
	
	// Закрывает Csv фаил
	protected function CloseCsvFile($CSVFileStream)
	{
		fclose($CSVFileStream);
	}
	
	//Записывает данные в csv фаил
	protected function WriteCsvFile($CSVFileStream,$data)
	{
		foreach($data as $value)
		{
			fputcsv($CSVFileStream, $value);
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