<?php
class Controller extends BaseController
{
	public $access = array();
//	public $access = array('create'=>'admin');
	public $denied = array();
	
	function validationRules()
	{
		return array( 
		);
	}
	
	/**
	 * Массив содержащий:
	 * currentAction - текущее действие,
	 * currentController - текущий контроллер.
	 * protected $info = array(currentAction, currentController);
	 */
	protected $info = array();
	
	function __construct()
	{
		$this->info['currentAction'] = $this->getAction();
		$this->info['currentController'] = $this->getController();
		parent::__construct($this->info);
	}

	public function getController()
	{
		$controllerName = 'Main';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if ( !empty($routes[1]) )
		{	
			$controllerName = $routes[1];
		}
		return $controllerName;
	}
	
	public function getAction()
	{
		$actionName = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if ( !empty($routes[2]) )
		{
			$actionName = $routes[2];
		}
		return $actionName;
	}
	
	public function getAccess($action)
	{

		return isset($this->access[$action]) ? $this->access[$action] : null;
	}
	
	public function getDenied($action)
	{

		return isset($this->denied[$action]) ? $this->denied[$action] : null;
	}

}
?>