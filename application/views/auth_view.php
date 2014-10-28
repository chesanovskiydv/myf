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
		<input type="text" name="login" id="login" value="login1">
	</p>

	<p>
		<label for="password">Пароль:</label>
		<input type="password" name="password" id="password" value="password1">
	</p>
<?php
	/*
	if(isset($data['error']))
	{
		echo $data['error'];
	}
	if(isset($data['success']))
	{
		echo $data['success'];
	}
	*/
	echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null);
?>
	<p class="login-submit">
		<button type="submit" class="login-button">Войти</button>
	</p>

	<!-- <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p> -->
	 <p class="forgot-password"><a href="auth/registration">Регистрация</a></p> 
</form>
<?php 
}
?>