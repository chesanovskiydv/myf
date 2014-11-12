<?php
class Controller_weather extends Controller
{
	public $access = array(
		'index'=>'*',
		);
		
	function __construct()
	{
		$this->model = new Model_Weather();
		parent::__construct();
	}

	function actionIndex()
	{
		$data = $this->model->getWeather();
		$this->view->generate('weather_view.php', 'template_view.php', $data);
	}
	
}
?>