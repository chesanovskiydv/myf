<?php
class Model_Comments extends Model
{
    function validationRules()
	{
		return array(
			'comment'=>array('notEmpty', 'max=255'),
		);
	}
	
	public function createComment($id,$comments,$emptyCom=true)
	{
	//	$comments = htmlspecialchars($comments);
	//	echo $comments;
	//	exit;
		if(!$emptyCom)
		{
			if(empty($comments))
			return false;
		}
		if(strlen($comments)>255)
		{
			return false;
		}
		$query = array(
				'table' => 'comments',
				'columns' => "author_id, comments",
				'values' => array($_SESSION['id'],$_POST['comment']),
			);
		$this->sqlInsert($query);
		return true;
	}

}
?>