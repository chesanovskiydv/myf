<?php
/**
 * ����� ��� ������ ������ � csv
 *
 */
class CsvAssistant
{
	private static $_loader;
   /**
	 * ����� ���������� ������� � csv, ������� = ������
	 *
	 * @param string $fileName �������� �����
	 * @param array $data ������ � �������
	 * @param bool $rewrite ��������
	 * @return $this
	 */
	public function saveCsvFile($fileName,$data, $rewrite=true)
	{
		$saveToCsvFile = $this->setCsvLines($fileName, $rewrite);
		foreach($data as $value)
		{
			$saveToCsvFile->send($value);
		}
	}
	
	public function setCsvLines($filename, $rewrite) 
	{
		try{
			if($rewrite)
			{
				$handle = fopen($filename, 'a');
			}
			else
			{
				$handle = fopen($filename, 'w');
			}
			if (!$handle) throw new Exception("Can't open the file \"$filename\"");
			while (true) {         
				$line = yield;     
				fputcsv($handle, $line);
			}
	    }catch (Exception $e) {
			echo "Error (File: ".$e->getFile().", line ".
					$e->getLine()."): ".$e->getMessage(), "\n";
		}	finally {
            fclose($handle);
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