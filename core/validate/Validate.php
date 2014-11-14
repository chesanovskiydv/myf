<?php 
class Validate 
{
	
	public static function isInt($var)
	{
		return preg_match('/^(0)$|^(\-)?([1-9][0-9]*)$/',$var) ? true : 'Должно быть int';
	}
	
	
	public static function isBool($var)
	{
		if(is_bool($var))
		{
			return true;
		}
		else
		{
			return 'Должно быть bool';
		}
	}
	
	//цифра
	public static function isNumeric($var)
	{
		if(is_numeric($var))
		{
			return true;
		}
		else
		{
			return 'Должно быть numeric';
		}
	}
	
	//Не пустое
	public static function notEmpty($var)
	{
		if(!empty($var))
		{
			return true;
		}
		else
		{
			return 'Должно быть не пустым';
		}
	}

	//Максимальное кол-во символов	
	public static function max($var, $lenght)
	{
		if(strlen($var)<=$lenght)
		{
			return true;
		}
		else
		{
			return "Должно быть не больше $lenght символов";
		}
	}
	
	
	//Минимальное кол-во символов
	public static function min($var, $lenght)
	{
		if(strlen($var)>=$lenght)
		{
			return true;
		}
		else
		{
			return "Должно быть не меньше $lenght символов";
		}
	}
	
	//регулярка
	public function checkRegExp($var,$Check)
    {
		if(preg_match($Check,$var))
		{
			return true;
		}
		else{
			return "Должно соответствовать регулярке";
		}
    }
	
	//email
	public static function isEmail($var)
	{
		if(preg_match('/^[^@]+@([^@\.]+\.)+[^@\.]+$/',$var))
		{
			return true;
		}
		else
		{
			return "Должно соответствовать формату email";
		}
	}
	
	//Имя пользователя (с ограничением 4-15 символов, которыми могут быть буквы и цифры, первый символ обязательно буква):
	public static function isUserName($var)
	{
		if(preg_match('/^[a-zA-Z][a-zA-Z0-9-_\.]{3,15}$/',$var))
		{
			return true;
		}
		else
		{
			return "Имя пользователя должно содержать только латинские буквы и цифры(4-15)";
		}
	}
	
	//Пароль (Строчные и прописные латинские буквы, цифры, 6-15 символов)
	public static function isPassword($var)
	{
		if(preg_match('/^[a-zA-Z0-9-_\.$%^&*#@!?><]{6,15}$/',$var))
		{
			return true;
		}
		else
		{
			return "Пароль должен содержать только латинские буквы и цифры(6-15)";
		}
	}
	
	//одинаковы ли
	public static function compare($var1, $var2)
	{
		if($var1===$var2)
		{
			return true;
		}
		else
		{
			return "Значение должно равнятся \"$var2\"";
		}
	}
	
	//Проверяет есть ли данное значение в указаном массиве значений
	public static function in($var, $arrayOfVars, $strict=false) //TODO: ??
	{
		if(in_array($var,$arrayOfVars, $strict))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//проверяет, находится ли длина строкового значения атрибута в указанном интервале
	public static function lenght($var, $min, $max) //TODO: ?? 2 аргумент парсить?
	{
		if($min<=strlen($var) && strlen($var)<=$max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//Обязательное поле
	public static function required($var) //TODO: ??
	{
		if(isset($var) && !empty($var))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>