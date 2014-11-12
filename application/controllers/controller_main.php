<?php 
class Controller_Main extends Controller
{
	public $access = array(
		'index'=>'*',
		);
    function actionIndex()
    {	
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
?>