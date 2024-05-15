<?php
session_start();
include_once "controllers/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Строительство и проектирование домов под ключ в Удмуртской Республике | Свой Дом - строительная компания</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<link rel="icon" href="../assets/images/custom/label.png" type="image/png">
	 <meta
     name="description"
     content="Проектирование и строительство надёжных и комфортных домов под ключ в Удмуртской Республике. Профессиональные услуги по доступным ценам."
    />
    <meta
     name="keywords"
     content="Удмуртская Республика, строительство домов, проектирование домов, дома под ключ, строительные компании, проектирование зданий."
    />
</head>
<body>
<?php
	$id_user=$_SESSION['client']['id'];
	$str_out_user="SELECT * FROM `users` WHERE id='$id_user'";
	$run_out_user=mysqli_query($connect,$str_out_user);
	$out_user=mysqli_fetch_array($run_out_user);
?>
		<header> 	
				<div class="label"><a href="/"><img src="../assets/images/custom/label.png" alt="Логотип" width="70"></a>
				</div>	
				<div class="site_name"><h1>Строительство и проектирование домов под ключ<br> по Удмуртской Республике</h1></div>
				<div class="auth">
			<?php
				if ($_SESSION['client']) {
					echo "<p class=greetings>Привет, $out_user[login]!<p>";
					echo "<p><a href=profile.php>Перейти в профиль</a></p>";
					echo "<p><a href=adminka/controllers/exit.php>Выход</a></p>";
				}
				else {

			?>
				<form method="POST" action="adminka/controllers/auth.php">
					<input type="text" name="login_auth" placeholder="Логин" value="<?php echo $_POST['login'];?>"><br>
					<input type="password" name="pass_auth" placeholder="Пароль"><br>
					<input type="submit" name="auth" value="Войти"><br>
					<p>Нет аккаунта?<a href="registration.php">Создать!</a></p>
					<?php
						echo $_SESSION['message_exit'];
						unset($_SESSION['message_exit']);

						echo $_SESSION['message_auth'];
						unset($_SESSION['message_auth']);
				}
			?>
					</form>
				</div>
		</header>