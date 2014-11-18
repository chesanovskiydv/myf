<?php 
class Validate 
{
	
	public static function isInt($var)
	{
		return preg_match('/^(0)$|^(\-)?([1-9][0-9]*)$/',$var) ? true : Localize::t('intError');
	}
	
	public static function isBool($var)
	{
		return is_bool($var) ? true : Localize::t('boolError');
	}
	
	//цифра
	public static function isNumeric($var)
	{
		return is_numeric($var) ? true : Localize::t('numericError');
	}
	
	//Не пустое
	public static function notEmpty($var)
	{
		return !empty($var) ? true : Localize::t('notEmptyError');
	}

	//Максимальное кол-во символов	
	public static function max($var, $lenght)
	{
		return (strlen($var)<=$lenght) ? true : Localize::t('maxError', $lenght);
	}
	
	
	//Минимальное кол-во символов
	public static function min($var, $lenght)
	{
		return (strlen($var)>=$lenght) ? true : Localize::t('minError', $lenght);
	}
	
	//регулярка
	public function checkRegExp($var,$Check)
    {
		return (preg_match($Check,$var)) ? true : Localize::t('regExpError');
    }
	
	//email
	public static function isEmail($var)
	{
		return preg_match('/^[^@]+@([^@\.]+\.)+[^@\.]+$/',$var) ? true : Localize::t('emailError');
	}
	
	//Имя пользователя (с ограничением 4-15 символов, которыми могут быть буквы и цифры, первый символ обязательно буква):
	public static function isUserName($var)
	{
		return (preg_match('/^[a-zA-Z][a-zA-Z0-9-_\.]{3,15}$/',$var)) ? true : Localize::t('userNameError');
	}
	
	//Пароль (Строчные и прописные латинские буквы, цифры, 6-15 символов)
	public static function isPassword($var)
	{
		return (preg_match('/^[a-zA-Z0-9-_\.$%^&*#@!?><]{6,15}$/',$var)) ? true : Localize::t('passwordError');
	}
	
	//одинаковы ли
	public static function compare($var1, $var2)
	{
		return ($var1===$var2) ? true : Localize::t('compareError', $var2);
	}
	
	/*
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
	*/
}
?>