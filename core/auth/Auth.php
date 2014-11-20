<?php
//Класс для работы с аутентификацией
class Auth extends MySQL
{
    //Аутентификация пользователя
	public function authentication($login, $password)
	{	
        $password = md5($password);
		$query_auth_array = array(
            'columns' => 'id, role',
            'table' => 'users',
            'nameParam' => 'login, password',
            'valParam' => array($login, $password),
        );

        $data = $this->sqlSelect($query_auth_array);
		
        $_SESSION['id'] = $data[0]['id'];
        $_SESSION['logIn'] = true;
		$_SESSION['role'] = $data[0]['role'];
        return isset($data) ? true : false;
	
	}
    // Проверка залогинен ли пользователь
    public static function LogIn()
    {
        return isset($_SESSION['id'],$_SESSION['logIn']) ? true : false;
    }
    //Выход с акаунта
    public function LogOut()
    {
        unset($_SESSION['id'],$_SESSION['logIn'],$_SESSION['role']);
    }
	//регистрация
	public function registration($login, $password, $password_confirm, $role='user')
	{
		if($password == $password_confirm)
		{
			if(!$this->checkAuth($login))
			{
				$password=md5($password);
				$this->sqlInsert(array(
									'table' => 'users', 
									'columns' => "login,password, role",
									'values' => array($login, $password, $role),
								));
				return true;
			}
			else
			{
				ErrorRegistry::set('registration', Localize::t('registration_1'));
				return false;
			//	$data['error'] = 'Такой логин уже существует';
			}
		}
		else
		{
			ErrorRegistry::set('registration', Localize::t('registration_2'));
			return false;
			//$data['error'] = 'Пароль и подтверждение пароля не совпадают!';
		}
	}
    
	public function checkAuth($login)
	{	
       // $password = md5($password);
		$query_auth_array = array(
            'columns' => 'id',
            'table' => 'users',
            'nameParam' => 'login',
            'valParam' => $login,
        );

        $data = $this->sqlSelect($query_auth_array);

        return isset($data) ? true : false;
	
	}
	
	public static function whoLogin()
	{	
       // $password = md5($password);
		$query_auth_array = array(
            'columns' => 'login',
            'table' => 'users',
            'nameParam' => 'id',
            'valParam' => $_SESSION['id'],
        );

        $data = MySQL::init()->sqlSelect($query_auth_array);
        return isset($data) ? $data[0]['login'] : false;
	
	}
	
	public static function init($className=__CLASS__)
	{
		return parent::init($className);
	}
}
?>