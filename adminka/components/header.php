<?php
session_start();
	if (!$_SESSION['user']) {
		header("Location:/adminka");
	}
	include "../controllers/db.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Панель администратора</title>
  <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>

<body>
  <?php
	$id_user=$_SESSION['user']['id'];
	$str_out_user="SELECT * FROM `users` WHERE id='$id_user'";
	$run_out_user=mysqli_query($connect,$str_out_user);
	$out_user=mysqli_fetch_array($run_out_user);
	?>
  <div class="wrapper">
    <header>
      <div class="name_admin">
        Панель администратора
      </div>
      <div class="welcome">
        СВОЙ ДОМ
      </div>
      <div>
        Привет, <?=$out_user['login'];?> <a href="controllers/exit.php">Перейти на сайт</a>
        <a href="controllers/exit.php">Выход</a>
      </div>
    </header>