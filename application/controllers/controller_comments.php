<?php
class Controller_Comments extends Controller
{

	function __construct()
	{
		$this->model = new Model_Comments();
		parent::__construct();
	}

	function action_index()
	{
		$query = array (
			'columns' => '*',
			'table' => 'comments',
		);
		$data = $this->model->sql_select($query);
		$queryUsers = array (
			'columns' => 'id,login',
			'table' => 'users',
		);
		$users = $this->model->sql_select($queryUsers);
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
	
	function action_create()
	{
		if(isset($_POST['comment']))
		{
			$query = array(
				'table' => 'comments',
				'columns' => "author_id, comments",
				'values' => "'".$_SESSION['id']."', '".$_POST['comment']."'",
			);
			$this->model->sql_insert($query);
			Route::redirect('comments');
		}
		$this->view->generate('comments_create.php', 'template_view.php');
	}
	
}
?>