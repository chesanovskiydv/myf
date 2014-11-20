<?php 
class ValidateAssistant
{
	
	function validate($data, $validationRules)
	{
		$validate = new Validate;
		foreach($validationRules as $key=>$value)
		{
		//	if(isset($_SESSION['error'][$key]))
		//	unset($_SESSION['error'][$key]); //удаляем старые ошибки
			if(isset($data[$key]))
			{
				foreach($value as $rule)
				{
					$ruleName = explode('=', $rule); 
					if(method_exists('Validate', $ruleName[0]))
					{
						if(isset($ruleName[1]))
						{		
							$tmp = Validate::$ruleName[0]($data[$key], $ruleName[1]);
						}
						else
						{
							 $tmp =  Validate::$ruleName[0]($data[$key]);
						}
						if($tmp!==true)
						{
							ErrorRegistry::set($key, $tmp);
							//$_SESSION['error'][имя переменной][номер ошибки]= сообщение об ошибке;	
							//	$_SESSION['error'][$key][] = $tmp;
						}
					}
				}
			}
		}
	//	return isset($_SESSION['error']) ? false : true;
//	print_r(ErrorRegistry::get());
//	exit;
		return (ErrorRegistry::get()!==null) ? false : true;
	}
}
?>