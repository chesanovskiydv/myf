<?php
//Класс для работы с аутентификацией
class Auth extends DB
{
    //Аутентификация пользователя
	public function authentication($login, $password)
	{	
        $password = md5($password);
		$query_auth_array = array(
            'columns' => 'id',
            'table' => 'users',
            'nameParam' => 'login, password',
            'valParam' => "'".$login."', '".$password."'",
        );

        $data = $this->sql_select($query_auth_array);
		
        $_SESSION['id'] = $data[0]['id'];
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        return isset($data) ? true : false;
	
	}
    // Проверка залогинен ли пользователь
    public static function LogIn()
    {
        return isset($_SESSION['id']) && isset($_SESSION['login']) && isset($_SESSION['password']) ? true : false;
    }
    //Выход с акаунта
    public function LogOut()
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        Model::redirect('auth');
    }
    

}
?>