<?php 
require_once 'ArrayLoadSaver.php';

class ArrayAssistant extends ArrayLoadSaver
{	

    protected $options = array(
        'checkRegExp' => true,
        'regExp' => array(
            'ipv4' => true,
        ),
    );
	
	private $regExp = array(
		'ipv4' => '/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}:[0-9]+/',
	);

/**
 * метод для преобразования данных из файла в массив
 *
 * @param string $filename Название файла
 * @param array $options = array(  - Массив опций
 *      'checkRegExp' => true,	   - Проверять ли регулярным выражением
 *      'regExp' => array(		   - Массив настроек для каждого регулярного выражения отдельно
 *           'ipv4' => true,	   - "название регулярки" = bool (проверять или не проверять)
 *       ),
 *   );
 * @return $this
 */
    public function FileToArray($filename, $options=null)
    {
        $ar = parent::FileToArray($filename)->getArray();
        if(isset($options['checkRegExp']) ? $options['checkRegExp'] : $this->options['checkRegExp'])
        {
			$this->dataArray = $this->checkRegExp($ar,$options['regExp']);
            return $this;
        }
		$this->dataArray = $ar;
        return $this;
    }

    public function checkRegExp($ar,$arrayOfChecks=null)
    {
		if(isset($arrayOfChecks))
		{
			$arrayOfChecks= array_merge($this->options['regExp'],$arrayOfChecks);
		}
		else{
			$arrayOfChecks= $this->options['regExp'];
		}
		//$arrayOfChecks = isset($arrayOfChecks) ? $arrayOfChecks : $this->options['regExp'];
		//print_r($arrayOfChecks);
		//? своя регулярка и замена а не добавление массива
		if(is_array($ar))
        {
			foreach($ar as $key=>$value)
            {
				foreach($arrayOfChecks as $nameRegExp=>$resolution)
				{
					if($resolution)
					{
						try{
							if(!isset($this->regExp[$nameRegExp]))
								throw new Exception("There is no such regular expression!");
							else{
								if(!preg_match($this->regExp[$nameRegExp],$value))
									unset($ar[$key]);
							}
						}
						catch (Exception $e) {
							echo "Error (File: ".$e->getFile().", line ".
								$e->getLine()."): ".$e->getMessage(), "\n";
							return false;
						}						
					}
				}
            }
			return !empty($ar) ? array_values($ar) : null;
        }
        else
        {
			foreach($arrayOfChecks as $nameRegExp=>$resolution)
			{
				if($resolution)
				{
					if(!preg_match($this->regExp[$nameRegExp],$ar))
					{
						return false;
					}
				}
			}
			return $ar;    
        }
    }

	public static function init($className=__CLASS__)
	{
		return parent::init($className);
	}
}
?>