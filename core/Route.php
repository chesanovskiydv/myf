<?php
class Route
{
    static function start()
    {
        // контроллер и действие по умолчанию
        $controllerName = 'Main';
        $actionName = 'index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{
			$controllerName = $routes[1];
		}

		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$act = explode('?', $routes[2]); 
			$actionName = $act[0];
		}
		
		if(in_array($_SERVER["REMOTE_ADDR"], Config::getBannedIp()) && $controllerName!='403')
		{	
			Route::errorPage403();
		}
		//Если не залогинен пользватель - отправлять регатся или авторизоватся
		if(!Auth::logIn() && $controllerName!='auth')
		{
			Route::redirect('auth');
		}
        // добавляем префиксы
        $modelName = $controllerName;
        $controllerName = 'Controller_'.$controllerName;
		$beforeActionName = 'beforeAction'.ucfirst($actionName);
		$afterActionName = 'afterAction'.ucfirst($actionName);
        $actionName = 'action'.ucfirst($actionName);

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($modelName).'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
        $controllerFile = strtolower($controllerName).'.php';
        $controllerPath = "application/controllers/".$controllerFile;
        if(file_exists($controllerPath))
        {
            include "application/controllers/".$controllerFile;
        }
        else
        {
             Route::errorPage404();
        }
        
        // создаем контроллер
			$controller = new $controllerName;
			//доступ по ролям
				$access = $controller->getAccess($controller->getAction());
				$denied = $controller->getDenied($controller->getAction());
				if($access!='*')
				{
					if(is_array($access))
					{
						if(!in_array(Route::checkRole(), $access))
						{
							Route::errorPage403();
						}
					}
					else
					{
						if(Route::checkRole()!=$access)
						{
							Route::errorPage403();
						}
					}
				}
				if(is_array($denied))
				{
					if(in_array(Route::checkRole(), $denied))
						{
							Route::errorPage403();
						}
				}
				else
				{
					if(Route::checkRole()==$denied)
						{
							Route::errorPage403();
						}
				}
						
			if(method_exists($controller, $beforeActionName))
			{
				// вызываем действие контроллера перед основным
			   $controller->$beforeActionName();
			}      
			if(method_exists($controller, $actionName))
			{
				// вызываем действие контроллера
				$controller->$actionName();
			}
			else
			{
				Route::errorPage404();
			}
			if(method_exists($controller, $afterActionName))
			{
				// вызываем действие контроллера перед основным
			   $controller->$afterActionName();
			} 
    }
    
    function errorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
	
	function errorPage403()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 403 Forbidden');
        header("Status: 403 Access denied");
        header('Location:'.$host.'403');
    }
    
    //Перенаправление на страницу
    public static function redirect($controllerAction)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.$controllerAction);
    }
	
	 public static function checkRole()
    {
        return isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
    }
}
?>