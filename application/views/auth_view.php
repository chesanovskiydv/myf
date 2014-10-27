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
		<input type="text" name="login" id="login" value="login3">
	</p>

	<p>
		<label for="password">Пароль:</label>
		<input type="password" name="password" id="password" value="password1">
	</p>

	<p class="login-submit">
		<button type="submit" class="login-button">Войти</button>
	</p>

	<!-- <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p> -->
</form>
<?php 
}
?>