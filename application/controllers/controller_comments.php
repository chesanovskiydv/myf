<?php
class Controller_Comments extends Controller
{

	function __construct()
	{
		$this->model = new Model_Comments();
		$this->view = new View();
	}

	function action_index()
	{
		$query = array (
			'columns' => '*',
			'table' => 'comments',
		);
		$data = $this->model->sql_select($query);
		/*
		$id_string = null;
		foreach($data as $key=>$val)
		{
			$id_string .=$val['author_id'];
			if($key<count($data)-1)
			{
				$id_string .=',';
			}
		}
		
		$query_author = array (
			'columns' => 'login',
			'table' => 'users',
			'nameParam' => 'id',
			'sign' => 'in',
			'valParam' => $id_string
		);
		$login_array = $this->model->sql_select($query_author);
		print_r($login_array);
		*/
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