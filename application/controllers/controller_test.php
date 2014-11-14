<?php
class Controller_Test extends Controller
{

	public $access = array(
		'index'=>'*',
		'parse'=>'*',
		);
		
	function __construct()
	{
		$this->model = new Model_Test();
	//	$this->view = new View();
		parent::__construct($this->info);
	}

	function actionIndex()
	{
        $data = $this->model->get_sql_data();		
		$this->view->generate('test_view.php', 'template_view.php', $data);
	}
	
	function actionParse()
	{	
		$_POST['qq']=1;
		$_POST['qq1']=true;
		$_POST['qq2']='1212as@mail.ru';
		$_POST['qq3']='sdf';
		$_POST['qq4']='sdf45';
		$_POST['qq5']='sdf';
		$_POST['qq6']='test1';
	//	$k = Validate::Max('asa_<');
	//	print_r($k);
		$this->model->setData($_POST);

		$this->model->validate();
		$this->view->generate('parse_view.php', 'template_view.php');
	}

}
?>