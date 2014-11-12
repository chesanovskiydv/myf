<?php
class Model_Comments extends Model
{
	public function createComment($id,$comments,$emptyCom=true)
	{
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