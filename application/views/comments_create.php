<form method="post" action="" id="comment_form">
		     
	<div class="commentCreateArea">
		<?php $this-> textarea('comment', isset($_POST['comment']) ? $_POST['comment'] : null, $style=array('id'=>'comment','placeholder'=>'Комментарий...', 'rows'=>10)); ?>
		<?php $this->errorLabelWidget('comment', 'comment', array('id'=>'error')); ?>
		<?php $this->input('submit','submit','Комментировать', array('class'=>'createCommentSubmit')); ?>
	</div>
	
	<?php //echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
	<?php //unset($_SESSION['error']['comment'][0]); ?>
</form>