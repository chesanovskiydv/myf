<?php
/**
 * ����� ��� ������ ������ � csv
 *
 */
class CsvAssistant
{
	private static $_loader;
   /**
	 * ������� ���������� ������� � csv, ������� = ������
	 *
	 * @param string $fileName �������� �����
	 * @param array $data ������ � �������
	 * @param bool $rewrite ��������
	 * @return $this
	 */
	public function saveCsvFile($fileName,$data, $rewrite=true)
	{
		$CSVFileStream = $this->OpenCsvFile($fileName,$rewrite);
		$this->WriteCsvFile($CSVFileStream,$data);
		$this->CloseCsvFile($CSVFileStream);
	}
	
	// ��������� Csv ���� ��������� ����� �� ����
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
	
	// ��������� Csv ����
	protected function CloseCsvFile($CSVFileStream)
	{
		fclose($CSVFileStream);
	}
	
	//���������� ������ � csv ����
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