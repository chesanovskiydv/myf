<?php 

/*
setcookie("id", "");
setcookie("login", "");
setcookie("password", "");
*/

if(isset($_SESSION['id']) && isset($_SESSION['login']) && isset($_SESSION['password']))
{
 ?>
<div class="hello">Здраствуйте,<?php echo $_SESSION['login'] ?></div>
<p><a href="/auth/logout">logout</a></p>
 <?php   
}
else
{
?>
<form method="post" action="" class="login">

	<p>
		<label for="login">Логин:</label>
		<?php $this->input('login','text', empty($_POST['login']) ? 'login1' : $_POST['login'], array('id'=>'login')); ?>
	</p>

	<p>
		<label for="password">Пароль:</label>
		<?php $this->input('password','password','password1', array('id'=>'password')); ?>
	</p>
	<?php //$this->bootstrapErrorLabel('login', 'login', array('id'=>'error')); ?>
	<?php //$this->bootstrapErrorLabel('password', 'password', array('id'=>'error')); ?>
	<?php //$this->bootstrapErrorLabel('auth', null, array('id'=>'error')); ?>
	<?php $this->bootstrapGroupErrorLabel(array(
		0 => array(
				'errorVarName' => 'login',
				'forName' => 'login',
				'style' => array('id'=>'error')
			),
		1 => array(
			'errorVarName' => 'password',
			'forName' => 'password',
			'style' => array('id'=>'error')
		),
		2 => array(
				'errorVarName' => 'auth',
				'forName' => null,
				'style' => array('id'=>'error')
			),
		)); ?>
	<p class="login-submit">
		<?php $this->submitButton('Войти', array('class'=>'login-button')); ?>
	</p>

	<!-- <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p> -->
	 <p class="forgot-password"><a href="/auth/registration">Регистрация</a></p> 
</form>
<?php 
}
//echo Cache::getCache('vvv');
//Cache::setCache('name441', 'val', 80001);
//echo $_SESSION['role'];
//echo phpinfo();

?>