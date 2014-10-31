<?php
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}

		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		//Если не залогинен пользватель - отправлять регатся или авторизовыватся
		if(!Auth::logIn() && ($controller_name!='auth' && ($action_name!='index' || $action_name!='registration'))){
			$controller_name='auth';
			$action_name = 'index';
		}
        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
		$before_action_name = 'before_action_'.$action_name;
		$after_action_name = 'after_action_'.$action_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }
        
        // создаем контроллер
			$controller = new $controller_name;
			$action = $action_name;
		
			if(method_exists($controller, $before_action_name))
			{
				// вызываем действие контроллера перед основным
			   $controller->$before_action_name();
			}      
			if(method_exists($controller, $action))
			{
				// вызываем действие контроллера
				$controller->$action();
			}
			else
			{
				Route::ErrorPage404();
			}
			if(method_exists($controller, $after_action_name))
			{
				// вызываем действие контроллера перед основным
			   $controller->$after_action_name();
			} 
    }
    
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
    
    //Перенаправление на страницу
    public static function redirect($controller_action)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.$controller_action);
    }
}
?>