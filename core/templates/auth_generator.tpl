<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Авторизация | generator</title>
	<link rel="stylesheet" href="css/mainCore.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.css" media="screen" type="text/css" />
</head>
<body>

    <center><img class="fusion_logo" src="images/logo.png" alt=""/></center>
    <div id="login">
        <form action="" method="POST">
            <fieldset class="clearfix">
              <p>
              <span class="fontawesome-user">
              <i class="fa fa-user"></i>
              </span>
              
              <input name="auth_name" type="text" value="" placeholder="Логин" required>
              </p>
              
              
              <p>
              <span class="fontawesome-lock">
              <i class="fa fa-unlock"></i>
              </span>
              
              <input name="auth_pass" type="password"  value="" placeholder="*******" required>
              </p> 
              
              <input type="hidden" name="token" value=""/>
              
              
              <p><input type="submit" name="auth_start" value="ВОЙТИ"></p>
            </fieldset>
        </form>
        <center><div class="error">{message}</div></center>
    </div>
    
    <div class="CoreCopy">Author <a href="mailto:tropic.r@gmail.com">tropic</a> &copy; 2016</div>
</body>
</html>