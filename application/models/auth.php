<?php
class Model_Auth extends Model
{
	function validationRules()
	{
		return array(
			'login'=>array('notEmpty', 'isUserName'),
			'password'=>array('notEmpty', 'isPassword'),
			'password_confirm'=>array('notEmpty'),
			'captcha'=>array('notEmpty'),
		);
	}
    
}
?>