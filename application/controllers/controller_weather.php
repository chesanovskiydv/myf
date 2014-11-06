<?php
class Controller_weather extends Controller
{

	function __construct()
	{
		$this->model = new Model_Weather();
		parent::__construct();
	}

	function action_index()
	{
		$data = $this->model->getWeather();
		$this->view->generate('weather_view.php', 'template_view.php', $data);
	}
	
}
?>