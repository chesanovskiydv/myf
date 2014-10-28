<div class="top_bar">
	<ul class="header_menu">
		<?php if(!Auth::LogIn()){ ?>
		<li><a href="auth/registration">Регистрация</a></li>
		<li><a href="auth">Вход</a></li>
		<?php } ?>
		<li><a href="/">Главная</a></li>
		<?php if(Auth::LogIn()){ ?>
		<li><a href="auth/logout">Выход</a></li>
		<?php } ?>
	</ul>
	<div class="login_container">
	<?php echo Auth::LogIn() ? $_SESSION['login'] : null ?>
	</div>
</div>