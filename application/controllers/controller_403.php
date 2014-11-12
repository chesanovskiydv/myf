<?php 
class Controller_403 extends Controller
{
	public $access = array('index'=>'*');
	
	function actionIndex()
	{	
		$this->view->generate('403_view.php', 'template_view.php');
	}
}
?>