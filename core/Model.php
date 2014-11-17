<?php
class Model extends MySQL
{
    //Массив с данными
    public $data = array();
	
	//правила валидации

    public function setData($array,$push=false)
    {
        $push ? array_push($this->data, $array) : $this->data = $array;
    }

    public function getData()
    {
        return $this->data;
    }
	
	function validationRules()
	{
		return array(
		);
	}
	
	public function validate()
	{
	//unset($_SESSION['error']); //TODO: Кудато перенести или убирать после отображения / Перенести в $errors = array();
		$validate = new Validate;
		foreach($this->validationRules() as $key=>$value)
		{
			if(isset($_SESSION['error'][$key]))
			unset($_SESSION['error'][$key]); //удаляем старые ошибки
		//	unset($_SESSION['error']); //удаляем старые ошибки
			if(isset($this->data[$key]))
			{
				foreach($value as $rule)
				{
					$ruleName = explode('=', $rule); 
					if(method_exists('Validate', $ruleName[0]))
					{
						if(isset($ruleName[1]))
						{		
							$tmp = Validate::$ruleName[0]($this->data[$key], $ruleName[1]);
						}
						else
						{
							 $tmp =  Validate::$ruleName[0]($this->data[$key]);
						}
						if($tmp!==true)
						{
							//$_SESSION['error'][имя переменной][номер ошибки]= сообщение об ошибке;
							//echo $key;
							$_SESSION['error'][$key][] = $tmp;
						}
					}
				}
			}
		}
		return isset($_SESSION['error']) ? false : true;
	}
}
?>