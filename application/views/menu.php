<div id="menu">
			<ul>
				<?php if(!Auth::LogIn()){ ?>
				<li><a href="/auth/registration">Регистрация</a></li>
				<li><a href="/auth">Вход</a></li>
				<?php } ?>
				<?php if(Auth::LogIn()){ ?>
				<li><a href="/">Главная</a></li>
				<li><a href="/comments">Коментарии</a></li>
				
				<li><a href="/comments/create">Оставить коментарий</a></li>
				<?php //} ?>
				<li><a href="/weather">Погода</a></li>
				<?php //if(Auth::LogIn()){ ?> 
					<li><a  id="exit" href="/auth/logout">Выход</a></li>
				<?php } ?>
			</ul>
			<br class="clearfix" />
		</div>
		<!--
		<li><a id="login" href="#"><?php echo Auth::whoLogin(); ?></a></li>
		-->
		