<?php
	session_start();
	if ($_SESSION['user']) {
		header("Location:dashboard.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админпанель</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
	<div class="auth">
		<h2>Панель<br>администратора</h2>
		<form action="controllers/auth.php" method="POST">
			<input type="text" name="login_auth" placeholder="Логин"><br>
			<input type="password" name="pass_auth" placeholder="Пароль"><br>
			<input type="submit" name="auth_admin" value="Войти">
		</form>
		<?php
			echo $_SESSION['message_auth'];
			
			if ($_SESSION['message_auth']) {
				session_unset();
			}
		?>
	</div>
</body>
</html>