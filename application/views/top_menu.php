<div class="top_bar">
	<ul class="header_menu">
		<?php if(!Auth::LogIn()){ ?>
		<li><a href="/auth/registration">Регистрация</a></li>
		<li><a href="/auth">Вход</a></li>
		<?php } ?>
		<li><a href="/">Главная</a></li>
		<li><a href="/comments">Коментарии</a></li>
		<?php if(Auth::LogIn()){ ?>
		<li><a href="/comments/create">Оставить коментарий</a></li>
		<?php } ?>
		<li><a href="/weather">Погода</a></li>
	</ul>
	<?php if(Auth::LogIn()){ ?> 
	<div class="login_container">
	<?php echo Auth::whoLogin(); ?>
	<span class="caret"></span>
	<ul>
		<li><a href="/auth/logout">Выход</a></li>
	</ul>
	</div>
	<?php } ?>
</div>