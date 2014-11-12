<?php 
class Validate 
{

	public static function isInt($var)
	{
		if(is_int($var))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public static function isBool($var)
	{
		if(is_bool($var))
		{
			return true;
		}
		else
		{
			return false;
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
			return false;
		}
	}
	
	//Не пустое
	public static function NotEmpty($var)
	{
		if(!empty($var))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//Максимальное кол-во символов	
	public static function Max($var, $lenght)
	{
		if(strlen($var)<$lenght)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//Минимальное кол-во символов
	public static function Min($var, $lenght)
	{
		if(strlen($var)>$lenght)
		{
			return true;
		}
		else
		{
			return false;
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
			return false;
		}
    }
	
	//email
	public static function isEmail($var)
	{
		if(self::checkRegExp($var, '/^[^@]+@([^@\.]+\.)+[^@\.]+$/'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//Имя пользователя (с ограничением 3-15 символов, которыми могут быть буквы и цифры, первый символ обязательно буква):
	public static function isUserName($var)
	{
		if(self::checkRegExp($var, '/^[a-zA-Z][a-zA-Z0-9-_\.]{3,15}$/'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//Пароль (Строчные и прописные латинские буквы, цифры, 6-15 символов)
	public static function isPassword($var)
	{
		if(self::checkRegExp($var, '/^[a-zA-Z0-9-_\.$%^&*#@!?><]{6,15}$/'))
		{
			return true;
		}
		else
		{
			return false;
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
			return false;
		}
	}
	
	//Проверяет есть ли данное значение в указаном массиве значений
	public static function in($var, $arrayOfVars, $strict=false)
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
	public static function lenght($var, $min, $max)
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
	public static function required($var)
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