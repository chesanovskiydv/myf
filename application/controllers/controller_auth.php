<?php
class Controller_Auth extends Controller
{
	public $access = array(
		'index'=>'*',
		'registration'=>'*',
		'logout'=>'*');
	public $auth_data = array();
	
	function __construct()
	{
		$this->model = new Model_Auth();
		$this->view = new View();
	}
	//аутентификация
	function actionIndex()
	{
		if(isset($_SESSION['success']))
		{
			$this->auth_data['success'] = $_SESSION['success'];
			unset($_SESSION['success']);
		}
		if(!empty($_POST['login']) || !empty($_POST['password']))
		{
			
			$this->model->setData($_POST);

			if($this->model->validate())
			{
				//авторизация
				$Auth_model = new Auth();

				if($Auth_model->authentication($_POST['login'], $_POST['password']))
				{
					Route::redirect('');
				 //   $this->view->generate('auth_view.php', 'template_view.php');
					return true;
				}
				else
				{
					ErrorRegistry::set('auth', Localize::t('auth'));
					//$this->auth_data['error'] = "Не правильный логин или пароль";
				}
			}
		}
		/*
		elseif((empty($_POST['login']) && !empty($_POST['password'])) || (!empty($_POST['login']) && empty($_POST['password'])))
		{
			$this->auth_data['error'] = 'Все поля должны быть заполнены';
		}
		*/
		$this->view->generate('auth_view.php', 'template_view.php', $this->auth_data);
	}
	//регистрация
	function actionRegistration()
	{
		$data=null;
		if(!empty($_POST['login']) || !empty($_POST['password']) || !empty($_POST['password_confirm']))
		{
			$this->model->setData($_POST);

			if($this->model->validate())
			{
			//авторизация
				$Auth_model = new Auth();
				
				if($_SESSION['secpic']==strtolower($_POST['captcha']))
				{
					$data = $Auth_model->registration($_POST['login'], $_POST['password'], $_POST['password_confirm']);
					if($data===true)
					{
						$_SESSION['success'] = 'Регистрация прошла успешно';
						Route::redirect('auth');
					}
					$_SESSION['error'] = $data['error'];
					//	$this->view->generate('auth_view.php', 'template_view.php');
				}
				else
				{
					ErrorRegistry::set('captcha', Localize::t('captchaError'));
				//	$data['error']="Не правильно введена капча";
				}
			}
			
		}
		$this->view->generate('registration_view.php', 'template_view.php', $data);
		return true;
	}

    function actionLogout()
    {
        $Auth_model = new Auth();
        $Auth_model->LogOut();   
        Route::redirect('auth');
    }
}
?>


