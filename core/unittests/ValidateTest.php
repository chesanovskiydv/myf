<?php 
require_once '../cnf/Config.php';
require_once '../validate/Validate.php';
require_once '../localization/Localize.php';
class ValidateTest extends PHPUnit_Framework_TestCase
{
	//генерация случайной строки 
	function randString( $length ) 
	{
		$str="";
	   // $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		$size = strlen($chars);
		for( $i = 0; $i < $length; $i++ ) 
		{
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	//isInt
	public function testIsIntSuccess()
	{
		$this->assertTrue(Validate::isInt((string) rand()));
	}
	
	public function testIsIntFailed_1()
	{
		$this->assertEquals(Validate::isInt($this->randString(rand())), Localize::t('intError'));
	}
	
	public function testIsIntFailed_2()
	{
		$this->assertEquals(Validate::isInt('56dsf546fg'), Localize::t('intError'));
	}
	//isBool
	public function testIsBoolSuccess_1()
	{
		 $this->assertTrue(Validate::isBool(true));
	}
	
	public function testIsBoolSuccess_2()
	{
		 $this->assertTrue(Validate::isBool(false));
	}
	
	public function testIsBoolFailed_1()
	{
		 $this->assertEquals(Validate::isBool($this->randString(rand())), Localize::t('boolError'));
	}	
	
	public function testIsBoolFailed_2()
	{
		 $this->assertEquals(Validate::isBool(rand()), Localize::t('boolError'));
	}

	public function testIsBoolFailed_3()
	{
		 $this->assertEquals(Validate::isBool((string) rand()), Localize::t('boolError'));
	}	
	
	public function testIsBoolFailed_4()
	{
		 $this->assertEquals(Validate::isBool(1), Localize::t('boolError'));
	}	
	
	public function testIsBoolFailed_5()
	{
		 $this->assertEquals(Validate::isBool('1'), Localize::t('boolError'));
	}
	
	public function testIsBoolFailed_6()
	{
		 $this->assertEquals(Validate::isBool('1true'), Localize::t('boolError'));
	}
	//isNumeric
	public function testIsNumericSuccess_1()
	{
		 $this->assertTrue(Validate::isNumeric(rand()));
	}
	
	public function testIsNumericSuccess_2()
	{
		 $this->assertTrue(Validate::isNumeric((string) rand()));
	}
	
	public function testIsNumericSuccess_3()
	{
		$this->assertTrue(Validate::isNumeric(rand()/100));
	}
	
	public function testIsNumericSuccess_4()
	{
		$this->assertTrue(Validate::isNumeric((string) rand()/100));
	}
	
	public function testIsNumericFailed_1()
	{
		$this->assertEquals(Validate::isNumeric($this->randString(rand())), Localize::t('numericError'));
	}
	
	public function testIsNumericFailed_2()
	{
		$this->assertEquals(Validate::isNumeric(true), Localize::t('numericError'));
	}
	//notEmpty
	public function testNotEmptySuccess_1()
	{
		$this->assertTrue(Validate::notEmpty($this->randString(rand())));
	}
	
	public function testNotEmptyFailed_1()
	{
		$this->assertEquals(Validate::notEmpty(""), Localize::t('notEmptyError'));
	}
	//max
	public function testMaxSuccess_1()
	{
		$strLenght = rand();
		$max = (string) rand($strLenght+1, getrandmax());
		$this->assertTrue(Validate::max($this->randString($strLenght), $max));
	}
	
	public function testMaxFailed_1()
	{
		$strLenght = rand();
		$max = (string) rand(0, $strLenght-1);
		$this->assertEquals(Validate::max($this->randString($strLenght), $max), Localize::t('maxError', $max));
	}
	//min
	public function testMinSuccess_1()
	{
		$strLenght = rand();
		$min = (string) rand(0, $strLenght-1);
		$this->assertTrue(Validate::min($this->randString($strLenght), $min));
	}
	
	public function testMinFailed_1()
	{
		$strLenght = rand();
		$min = (string) rand($strLenght+1, getrandmax());
		$this->assertEquals(Validate::min($this->randString($strLenght), $min), Localize::t('minError', $min));
	}
}
?>