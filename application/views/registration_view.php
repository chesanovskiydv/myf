<form method="post" action="" class="login">
	<p>
		<label for="login">Логин:</label>
		<?php $this->input('login','text',isset($_POST['login']) ? $_POST['login'] : "login1", array('id'=>'login')); ?>
	</p>

	<p>
		<label for="password">Пароль:</label>
		<?php $this->input('password','password','password1', array('id'=>'password')); ?>
	</p>
	
	<p>
		<label for="password_confirm">Пароль:</label>
		<?php $this->input('password_confirm','password','password1', array('id'=>'password_confirm')); ?>
	</p>
	<label for="captcha">Капча:</label>
	<img src="/captcha.php" alt="защитный код">
	<p>
		<?php $this->input('captcha','text',null, array('id'=>'captcha')); ?>
	</p>
<?php  //echo $_SESSION['secpic']; ?>
	<!-- -->
	<p class="login-submit">
		<?php $this->submitButton('Войти', array('class'=>'login-button')); ?>
	</p>
	<?php $this->errorLabelWidget('login', 'login',array('id'=>'error')); ?>
	<?php $this->errorLabelWidget('password', 'password',array('id'=>'error')); ?>
	<?php $this->errorLabelWidget('password_confirm', 'password_confirm',array('id'=>'error')); ?>
	<?php $this->errorLabelWidget('captcha', 'captcha',array('id'=>'error')); ?>
<?php echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
	<!-- <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p> -->
</form>

	
