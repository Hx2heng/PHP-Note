<?php 
require_once './handle/include.php';
session_start();

	if(isset($_GET['action']))
	{
		if($_GET['action']=='outlogin')
		{
			unset($_SESSION['username']);
		};	
	}
	
	if(isset($_SESSION['username'])){
		AlertMessages('已经登录。', './indexsss.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Zen's Note</title>
<link href="css/mycss.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="logindiv">
<form id="loginform" action=".\handle\dologin.php" method="post">
<input class="inputxt" type="text" name="username" placeholder="输入用户名"/>
<input class="inputxt" type="password" name="password" placeholder="输入密码"/>
<input class="btn" type="submit" />
</form>
</div>
</body>
</html>