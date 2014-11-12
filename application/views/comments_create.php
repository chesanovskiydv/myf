<form method="post" action="" id="comment_form">
		     
	<div>
	    <textarea rows="10" name="comment" id="comment" placeholder="Комментарий..."></textarea>
	</div>
	<div>
		<input name="submit" value="Комментировать" type="submit">
	</div>
	<?php echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
</form>