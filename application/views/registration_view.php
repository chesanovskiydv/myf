<form method="post" action="" class="login">
	<p>
		<label for="login">Логин:</label>
		<input type="text" name="login" id="login" value="<?php echo isset($_POST['login']) ? $_POST['login'] : "login1"; ?>">
	</p>

	<p>
		<label for="password">Пароль:</label>
		<input type="password" name="password" id="password" value="password1">
	</p>
	
	<p>
		<label for="password_confirm">Пароль:</label>
		<input type="password" name="password_confirm" id="password_confirm" value="password1">
	</p>
	<!-- -->
	<!--
<p><img src="../mcaptcha.php"></p>
<p><input type="text" name="keystring"></p>
-->
<label for="captcha">Капча:</label>
<img src="/captcha.php" alt="защитный код">
<p><input type="text" name="captcha" id="captcha"></p>
<?php  //echo $_SESSION['secpic']; ?>
	<!-- -->
	<p class="login-submit">
		<button type="submit" class="login-button">Войти</button>
	</p>
<?php echo isset($data['error']) ? $data['error'] : (isset($data['success']) ? $data['success'] : null); ?>
	<!-- <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p> -->
</form>
