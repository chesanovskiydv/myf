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
			'qq'=>array('isInt'),
			'qq1'=>array('isBool'),
			'qq2'=>array('isEmail'),
			'qq3'=>array('isUserName'),
			'qq4'=>array('isPassword'),
			'qq5'=>array('min=5'),
			'qq6'=>array('compare=test'),
		);
	}
	
	public function validate()
	{
		$validate = new Validate;
		foreach($this->validationRules() as $key=>$value)
		{
			unset($_SESSION['error'][$key]); //удаляем старые ошибки
			if(isset($this->data[$key]))
			{
				foreach($value as $rule)
				{
					$ruleName = explode('=', $rule); 
				//	if(in_array($ruleName[0],get_class_methods('Validate')))
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