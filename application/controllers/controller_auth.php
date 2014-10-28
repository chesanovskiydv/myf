<?php
class Controller_Auth extends Controller
{
	public $auth_data = array();
	
	function __construct()
	{
		$this->model = new Model_Auth();
		$this->view = new View();
	}
	//аутентификация
	function action_index()
	{
		if(isset($_SESSION['success']))
		{
			$this->auth_data['success'] = $_SESSION['success'];
			unset($_SESSION['success']);
		}
		if(!empty($_POST['login']) && !empty($_POST['password']))
		{
			//авторизация
            $Auth_model = new Auth();
            
            if($Auth_model->authentication($_POST['login'], $_POST['password']))
            {
				Model::redirect('');
             //   $this->view->generate('auth_view.php', 'template_view.php');
				return true;
            }
            else
            {
				$this->auth_data['error'] = "Не правильный логин или пароль";
            }
		}
		elseif((empty($_POST['login']) && !empty($_POST['password'])) || (!empty($_POST['login']) && empty($_POST['password'])))
		{
			$this->auth_data['error'] = 'Все поля должны быть заполнены';
		}
		$this->view->generate('auth_view.php', 'template_view.php', $this->auth_data);
	}
	//регистрация
	function action_registration()
	{	
		if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_confirm']))
		{
			//авторизация
			$Auth_model = new Auth();

			$Auth_model->registration($_POST['login'], $_POST['password'], $_POST['password_confirm']);
			$_SESSION['success'] = 'Регистрация прошла успешно';
			Model::redirect('auth');
			//	$this->view->generate('auth_view.php', 'template_view.php');
			return true;
			
		}
		$this->view->generate('registration_view.php', 'template_view.php');
		return true;
	}
    
    function action_logout()
    {
        $Auth_model = new Auth();
        $Auth_model->LogOut();   
        $this->view->generate('auth_view.php', 'template_view.php');
    }
}
?>


