<div class="top_bar">
	<ul class="header_menu">
		<?php if(!Auth::LogIn()){ ?>
		<li><a href="auth/registration">Регистрация</a></li>
		<li><a href="/auth">Вход</a></li>
		<?php } ?>
		<li><a href="/">Главная</a></li>
	</ul>
	<div class="login_container">
	<?php echo Auth::LogIn() ? $_SESSION['login'] : null ?>
	<span class="caret"></span>
	<ul>
		<li><a href="auth/logout">Выход</a></li>
	</ul>
	</div>
</div>