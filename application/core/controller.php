<?php
class Controller extends BaseController
{
	/* Массив содержащий:
	 * currentAction - текущее действие,
	 * currentController - текущий контроллер.
	 *	protected $info = array(currentAction, currentController);
	 */
	protected $info = array();
	//Конструктор
	function __construct()
	{
		$this->info['currentAction'] = $this->getAction();
		$this->info['currentController'] = $this->getController();
		parent::__construct($this->info);
	}
	/*
    public $scripts = array(
		'js' => array(),
		'css' => array(),
	);
		
	public function registerJsScripts($jsName)
	{
		$this->scripts['js'][] = "../../js/".$jsName;
	}
	*/
	public function getController()
	{
		$controller_name = 'Main';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		return $controller_name;
	}
	
	public function getAction()
	{
		$action_name = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		return $action_name;
	}
	

}
?>