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
		<input type="text" name="login" id="login" value="<?php echo empty($_POST['login']) ? 'login1' : $_POST['login'] ?>">
	</p>

	<p>
		<label for="password">Пароль:</label>
		<input type="password" name="password" id="password" value="password1">
	</p>
<?php

	echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null);
?>
	<p class="login-submit">
		<button type="submit" class="login-button">Войти</button>
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