<form method="post" action="" id="comment_form">
		     
	<div>
		<?php $this-> textarea('comment', isset($_POST['comment']) ? $_POST['comment'] : null, $style=array('id'=>'comment','placeholder'=>'Комментарий...', 'rows'=>10)); ?>
	</div>
	<div>
		<?php $this->input('submit','submit','Комментировать', array()); ?>
	</div>
	<?php $this->errorLabelWidget('comment',array('for'=>'comment')); ?>
	<?php //echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
	<?php //unset($_SESSION['error']['comment'][0]); ?>
</form>