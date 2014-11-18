<?php
class Controller_Comments extends Controller
{
	public $access = array(
	'index'=>'*',
	'create'=>'*'
	//'create'=>'admin',
	//'create'=>array('admin','user')
	);
	
//	public $denied = array('index'=>'user');
	
	function __construct()
	{
		$this->model = new Model_Comments();
		parent::__construct();
	}

	function actionIndex()
	{
		$query = array (
			'columns' => '*',
			'table' => 'comments',
		);
		$data = $this->model->sqlSelect($query);
		$queryUsers = array (
			'columns' => 'id,login',
			'table' => 'users',
		);
		$users = $this->model->sqlSelect($queryUsers);
		foreach($data as &$value)
		{
			foreach($users as $valUsers)
			{
				if($value['author_id'] == $valUsers['id'])
				{
					$value['author_id'] = $valUsers['login'];
					break;
				}
			}
		}
		unset($value);
		$this->view->generate('comments_view.php', 'template_view.php', $data);
	}
	
	function actionCreate()
	{
	//$data="";
		if(isset($_POST['comment']))
		{
			$_POST['comment'] = htmlspecialchars($_POST['comment']);
			$this->model->setData($_POST);

			$this->model->validate();
			if($this->model->createComment($_SESSION['id'],$_POST['comment'], false))
			{
				Route::redirect('comments');
			}
		//	else
		//	{
		//		$data['error'] = "Комментарий должен быть не больше 255 символов";
		//	}
		}
		$this->view->generate('comments_create.php', 'template_view.php');//, $data);
	}
	
}
?>