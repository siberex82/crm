<div class="authoris_box">
<center><img width="250" src="/images/auth-logo.png" alt=""/></center>
<form id="loginForm" action="" method="post">

	<div class="field">

		<div class="input"><input type="text" name="singin_login" value="" id="login" required placeholder="Логин"/></div>
	</div>

	<div class="field">
		<!--a href="#" id="forgot">Забыли пароль?</a-->
		<div class="input"><input type="password" name="singin_pass" value="" id="pass" required placeholder="*********"/></div>
	</div>
        <input type="hidden" name="token" value="{token}"/>
	<div class="submit">
		<button type="submit" name="singin_submit">Войти</button>
		<label id="remember"><input name="" type="checkbox" value="" /> Запомнить меня</label>
	</div>

</form>

</div>


        
    