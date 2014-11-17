<?php
class Model_Auth extends Model
{
	function validationRules()
	{
		return array(
			'login'=>array('notEmpty'),
			'password'=>array('notEmpty'),
			'password_confirm'=>array('notEmpty'),
			'captcha'=>array('notEmpty'),
		);
	}
    
}
?>