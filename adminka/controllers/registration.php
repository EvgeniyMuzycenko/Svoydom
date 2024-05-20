<?php
	session_start();
	include "../../controllers/db.php";

	$fam=$_POST['fam'];
	$name=$_POST['name'];
	$l_name=$_POST['l_name'];
	$birthday=$_POST['birthday'];
	$mail=$_POST['mail'];
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$gender=$_POST['gender'];
	$name_img_avatar=$_FILES['avatar']['name'];
	$type=$_FILES['avatar']['type'];
	$tmp_name=$_FILES['avatar']['tmp_name'];
	$size=$_FILES['avatar']['size'];
	$full_path="../../assets/images/users/$name_img_avatar";
	$about_user=$_POST['about_user'];
	$add_user=$_POST['add_user'];
	$reg=$_POST['reg'];

	$str_add_user="INSERT INTO `users`(`login`, `password`, `fam`, `name`, `l_name`, `birthday`, `mail`, `gender`, `avatar`, `about_user`) VALUES ('$login','$pass','$fam','$name','$l_name','$birthday','$mail','$gender','$name_img_avatar','$about_user');";

	$date1=date("Y-m-d", strtotime("-18 years"));
	$date2=strtotime($date1);

	$date3=date("Y-m-d", strtotime("-80 years"));
	$date4=strtotime($date3);
	
	if ($fam AND $name AND $l_name AND $birthday AND $mail AND $login AND $pass AND $repass AND $gender) {
		if ($pass==$repass) {
			if (strtotime($birthday) < $date2 AND strtotime($birthday) > $date4) {
			$run_add_user=mysqli_query($connect,$str_add_user);
			if ($run_add_user) {
				move_uploaded_file($tmp_name, $full_path);
			}
			if ($run_add_user) {
			if ($add_user) {
				$_SESSION['message']="Вы успешно добавили пользователя!";
			}
			elseif ($reg) {
				$_SESSION['message']="Вы успешно зарегистрировались!";
			}
		}
		else {
			if ($add_user) {
				$_SESSION['error']="Ошибка добавления пользователя!";
			}
			elseif ($reg) {
				$_SESSION['error']="Ошибка регистрации!";
			}
		}
	}
		else 
	{
		$_SESSION['error']="Неверная дата рождения!";
	}
}
	else 
	{
		$_SESSION['error']="Пароли не совпадают!";
		 }
	} 
	else 
	{
		$_SESSION['error']="Заполните все поля!";
	}
			if ($add_user) {
				header("Location:../users.php");
			}
			elseif ($reg) {
				header("Location:../../registration.php");
			}
	?>