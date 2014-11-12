<?php 
class Controller_404 extends Controller
{
	public $access = array('index'=>'*');
	
	function actionIndex()
	{	
		$this->view->generate('404_view.php', 'template_view.php');
	}
}
?>