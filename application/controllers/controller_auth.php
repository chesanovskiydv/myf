<?php
class Controller_Auth extends Controller
{
	function __construct()
	{
		$this->model = new Model_Auth();
		$this->view = new View();
	}
	
	function action_index()
	{	
		if(!empty($_POST['login']) && !empty($_POST['password']))
		{
			//авторизация
            $Auth_model = new Auth();
            
            if($Auth_model->authentication($_POST['login'], $_POST['password']))
            {
                $this->view->generate('auth_view.php', 'template_view.php');
                return true;
            }
            else
            {
             echo "Не правильный логин или пароль";   
            }
		}
		$this->view->generate('auth_view.php', 'template_view.php');
	}
    
    function action_logout()
    {
        $Auth_model = new Auth();
        $Auth_model->LogOut();   
        $this->view->generate('auth_view.php', 'template_view.php');
    }
}
?>


