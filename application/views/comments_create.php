<form method="post" action="" id="comment_form">
		     
	<div>
		<?php $this-> textarea('comment', null, $style=array('id'=>'comment','placeholder'=>'Комментарий...', 'rows'=>10)); ?>
	</div>
	<div>
		<?php $this->input('submit','submit','Комментировать', array()); ?>
	</div>
	<?php echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
</form>