<?php 
require_once '../validate/Validate.php';
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
	
	public function testIsIntFailed()
	{
		$this->assertEquals(Validate::isInt($this->randString(rand())),'Должно быть int');
		$this->assertEquals(Validate::isInt($this->randString(rand())),'Должно быть int');
		$this->assertEquals(Validate::isInt($this->randString(rand())),'Должно быть int');
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
		 $this->assertEquals(Validate::isBool($this->randString(rand())),'Должно быть bool');
		 $this->assertEquals(Validate::isBool($this->randString(rand())),'Должно быть bool');
		 $this->assertEquals(Validate::isBool($this->randString(rand())),'Должно быть bool');
	}	
	
	public function testIsBoolFailed_2()
	{
		 $this->assertEquals(Validate::isBool(rand()),'Должно быть bool');
	}

	public function testIsBoolFailed_3()
	{
		 $this->assertEquals(Validate::isBool((string) rand()),'Должно быть bool');
	}	
	
	public function testIsBoolFailed_4()
	{
		 $this->assertEquals(Validate::isBool(1),'Должно быть bool');
	}	
	
	public function testIsBoolFailed_5()
	{
		 $this->assertEquals(Validate::isBool('1'),'Должно быть bool');
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
		$this->assertEquals(Validate::isNumeric($this->randString(rand())), 'Должно быть чисдо');
		$this->assertEquals(Validate::isNumeric($this->randString(rand())), 'Должно быть чисдо');
		$this->assertEquals(Validate::isNumeric($this->randString(rand())), 'Должно быть чисдо');
	}
	
	public function testIsNumericFailed_2()
	{
		$this->assertEquals(Validate::isNumeric(true), 'Должно быть чисдо');
	}
	//notEmpty
	public function testNotEmptySuccess_1()
	{
		$this->assertTrue(Validate::notEmpty($this->randString(rand())));
	}
	
	public function testNotEmptyFailed_1()
	{
		$this->assertEquals(Validate::notEmpty(""), 'Должно быть не пустым');
	}
	//max
	public function testMaxSuccess_1()
	{
		$strLenght = rand();
		$max = (string) rand($strLenght+1, getrandmax());
		$this->assertTrue(Validate::max($this->randString($strLenght), $max));
		$this->assertTrue(Validate::max($this->randString($strLenght), $max));
		$this->assertTrue(Validate::max($this->randString($strLenght), $max));
	}
	
	public function testMaxFailed_1()
	{
		$strLenght = rand();
		$max = (string) rand(0, $strLenght-1);
		$this->assertEquals(Validate::max($this->randString($strLenght), $max), "Должно быть не больше $max символов");
		$this->assertEquals(Validate::max($this->randString($strLenght), $max), "Должно быть не больше $max символов");
		$this->assertEquals(Validate::max($this->randString($strLenght), $max), "Должно быть не больше $max символов");
	}
	//min
	public function testMinSuccess_1()
	{
		$strLenght = rand();
		$min = (string) rand(0, $strLenght-1);
		$this->assertTrue(Validate::min($this->randString($strLenght), $min));
		$this->assertTrue(Validate::min($this->randString($strLenght), $min));
		$this->assertTrue(Validate::min($this->randString($strLenght), $min));
	}
	
	public function testMinFailed_1()
	{
		$strLenght = rand();
		$min = (string) rand($strLenght+1, getrandmax());
		$this->assertEquals(Validate::min($this->randString($strLenght), $min), "Должно быть не меньше $min символов");
		$this->assertEquals(Validate::min($this->randString($strLenght), $min), "Должно быть не меньше $min символов");
		$this->assertEquals(Validate::min($this->randString($strLenght), $min), "Должно быть не меньше $min символов");
	}
}
?>