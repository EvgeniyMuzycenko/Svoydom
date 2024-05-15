<?php
	session_start();
	include "../../controllers/db.php";

		/*PROJECTS*/
		$edit_proj=$_GET['edit_proj'];

		$name_proj=$_POST['name_proj'];
		$price=$_POST['price'];
		$code=$_POST['code'];
		$type_of_house=$_POST['type_of_house'];
		$num_of_floors=$_POST['num_of_floors'];
		$total_area=$_POST['total_area'];
		$materials=$_POST['materials'];
		$dimensions=$_POST['dimensions'];
		$id_cat=$_POST['id_cat'];
		$img_proj=$_POST['img_proj'];
		$description=$_POST['description'];
		$add_proj=$_POST['add_proj'];
		
		$name_img_proj=$_FILES['img_proj']['name'];
		$type=$_FILES['img_proj']['type'];
		$tmp_name=$_FILES['img_proj']['tmp_name'];
		$size=$_FILES['img_proj']['size'];

		$name_img_fp=$_FILES['img_fp']['name'];
		$type_fp=$_FILES['img_fp']['type'];
		$tmp_name_fp=$_FILES['img_fp']['tmp_name'];
		$size_fp=$_FILES['img_fp']['size'];

		$full_path1="../../assets/images/projects/$name_img_proj";
		$full_path2="../../assets/images/projects/$name_img_fp";

		echo $full_path1;
		echo $full_path2;

		if ($name_img_proj AND $name_img_fp) {
		$str_upd_proj="UPDATE `projects` SET 
		`name_proj` = '$name_proj', 
		`code` = '$code', 
		`type_of_house` = '$type_of_house', 
		`num_of_floors` = '$num_of_floors', 
		`total_area` = '$total_area', 
		`materials` = '$materials', 
		`dimensions` = '$dimensions', 
		`price` = '$price', 
		`id_cat` = '$id_cat', 
		`img_proj` = '$name_img_proj', 
		`img_fp` = '$name_img_fp', 
		`description` = '$description' 
		WHERE `id` = $edit_proj";

		if($type=='image/png') {
			if($size<600000) {
				if ($name_proj) {
					$run_upd_proj=mysqli_query($connect,$str_upd_proj);
				if ($run_upd_proj) {
					move_uploaded_file($tmp_name, $full_path1);
					move_uploaded_file($tmp_name_fp, $full_path2);
					header("Location:../projects.php");
				}
			}
			else 
			{
				echo "Заполните поля!";
			}
		}
		else 
		{
				echo "Слишком большой размер файла";
		}
	}
		else 
		{
			  echo "Неверный тип файла";
		}
		}
		else {
		$str_upd_proj="UPDATE `projects` SET 
		`name_proj` = '$name_proj', 
		`code` = '$code', 
		`type_of_house` = '$type_of_house', 
		`num_of_floors` = '$num_of_floors', 
		`total_area` = '$total_area', 
		`materials` = '$materials', 
		`dimensions` = '$dimensions', 
		`price` = '$price', 
		`id_cat` = '$id_cat', 
		`description` = '$description' 
		WHERE `id` = $edit_proj";

		$run_upd_proj=mysqli_query($connect,$str_upd_proj);
				if ($run_upd_proj) {
					move_uploaded_file($tmp_name, $full_path1);
					move_uploaded_file($tmp_name_fp, $full_path2);
					header("Location:../projects.php");
				}
		}


			/*CATALOG*/
			$edit_cat=$_GET['edit_cat'];

			$name_cat=$_POST['name_cat'];	
			$img_cat=$_POST['img_cat'];
        	$add_cat=$_POST['add_cat'];

        	$name_img_cat=$_FILES['img_cat']['name'];
			$type_cat=$_FILES['img_cat']['type'];
			$tmp_name_cat=$_FILES['img_cat']['tmp_name'];
			$size_cat=$_FILES['img_cat']['size'];

			$full_path="../assets/images/catalog/$name_img_cat";
			echo $full_path;
			
			if ($name_img_cat) {
			$str_upd_cat="UPDATE `catalog` SET 
			`name_cat` = '$name_cat',
			`img_cat` = '$name_img_cat'
			WHERE `id` = $edit_cat";

			echo $str_upd_cat;
			
				if($type_cat=='image/png') {
					if($size_cat<600000) {
						if ($name_cat) {
					$run_upd_cat=mysqli_query($connect,$str_upd_cat);
					echo"Запрос выполнен"; 
				if ($run_upd_cat) {
					move_uploaded_file($tmp_name_cat, $full_path);
					header("Location:../catalog.php");
				}
			}
			else {
				echo "Заполните поля!";
			}
		}
		else {
				echo "Слишком большой размер файла";
		}
	}
		else {
			  echo "Неверный тип файла";
		}
	} 
		else {
		$str_upd_cat="UPDATE `catalog` SET 
		`name_cat` = '$name_cat' 
		WHERE `id` = $edit_cat";

		$run_upd_cat=mysqli_query($connect,$str_upd_cat);
				if ($run_upd_cat) {
					move_uploaded_file($tmp_name_cat, $full_path);
					header("Location:../catalog.php");
	}
}

			/*USERS*/
			$edit_user=$_GET['edit_user'];

			$login=$_POST['login'];
			$pass=$_POST['pass'];
			$repass=$_POST['repass'];
			$fam=$_POST['fam'];
			$name=$_POST['name'];
			$l_name=$_POST['l_name'];
			$birthday=$_POST['birthday'];
			$mail=$_POST['mail'];
			$gender=$_POST['gender'];
			$about_user=$_POST['about_user'];
			$ed_user=$_POST['ed_user'];
			$ed_prof=$_POST['ed_prof'];

			$name_img_avatar=$_FILES['avatar']['name'];
			$type_avatar=$_FILES['avatar']['type'];
			$tmp_name_avatar=$_FILES['avatar']['tmp_name'];
			$size_avatar=$_FILES['avatar']['size'];

			$full_path3="../assets/images/users/$name_img_avatar";
			echo $full_path3;

			if ($name_img_avatar) {
			$str_upd_user="UPDATE `users` SET 
			`login` = '$login',
			`password` = '$pass',
			`fam` = '$fam',
			`name` = '$name',
			`l_name` = '$l_name',
			`birthday` = '$birthday',
			`mail` = '$mail',
			`gender` = '$gender', 
			`avatar` = '$name_img_avatar',
			`about_user` = '$about_user'
			WHERE `id` = $edit_user";

			echo $str_upd_user;

			$date1=date("Y-m-d", strtotime("-18 years"));
			$date2=strtotime($date1);

			$date3=date("Y-m-d", strtotime("-80 years"));
			$date4=strtotime($date3);

				if($type_avatar=='image/png') {
					if($size_avatar<600000) {
						if ($login) {
							if ($pass==$repass) {
								if (strtotime($birthday) < $date2 AND strtotime($birthday) > $date4) {
							$run_upd_user=mysqli_query($connect,$str_upd_user);
							$_SESSION['message']="Изменения сохранены!";
			if ($run_upd_user) {
							move_uploaded_file($tmp_name_avatar, $full_path3);
					if ($ed_user) {
					header("Location:../users.php");
				}
					elseif ($ed_prof) {
					header("Location:../../profile.php");	
					}
				}
			}
				else 
				{
						$_SESSION['error']="Неверная дата рождения!";
				}
			}
				else {
						$_SESSION['error']="Пароли не совпадают!";

				}
			}
				else {
						$_SESSION['error']="Заполните все поля!";
				}
			}
				else {
					$_SESSION['error']="Слишком большой размер файла!";
				}
			}
			else {
				$_SESSION['error']="Неверный тип файла";
			}
				if ($ed_user) {
				header("Location:../users.php");
				}
				elseif ($ed_prof) {
				header("Location:../../profile.php");	
				}
		}
		
		else {
		$str_upd_user="UPDATE `users` SET 
			`login` = '$login',
			`password` = '$pass',
			`fam` = '$fam',
			`name` = '$name',
			`l_name` = '$l_name',
			`birthday` = '$birthday',
			`mail` = '$mail',
			`gender` = '$gender', 
			`about_user` = '$about_user' 
		WHERE `id` = $edit_user";

			$date1=date("Y-m-d", strtotime("-18 years"));
			$date2=strtotime($date1);

			$date3=date("Y-m-d", strtotime("-80 years"));
			$date4=strtotime($date3);

		if ($login) {
			if ($pass==$repass) {
				if (strtotime($birthday) < $date2 AND strtotime($birthday) > $date4) {
				$run_upd_user=mysqli_query($connect,$str_upd_user);
				$_SESSION['message']="Изменения сохранены!";
				if ($run_upd_user) {
					move_uploaded_file($tmp_name_avatar, $full_path3);
					if ($ed_user) {
					header("Location:../users.php");
				}
					elseif ($ed_prof) {
					header("Location:../../profile.php");	
					}
			}
		}
					else 
					{
						$_SESSION['error']="Неверная дата рождения!";
					}
				}
					else {
						$_SESSION['error']="Пароли не совпадают!";
					}
				}
					else {
						$_SESSION['error']="Заполните все поля!";
					}
				if ($ed_user) {
				header("Location:../users.php");
				}
				elseif ($ed_prof) {
				header("Location:../../profile.php");	
				}
				}		


			/*ORDERS*/
			$edit_order=$_GET['edit_order'];

			$proj_id=$_POST['proj_id'];
			$ed_order_user=$_POST['edit_order_user'];
			$ed_order_client=$_POST['edit_order_client'];
	
			$str_upd_order="UPDATE `orders` SET 
			`proj_id` = '$proj_id',
			`update_at` = CURRENT_TIMESTAMP()
			WHERE `id` = $edit_order"; 
			 
			echo $str_upd_order;
			
			$run_upd_order=mysqli_query($connect,$str_upd_order);
					echo "Запрос выполнен"; 
			if ($run_upd_order) {
				if($ed_order_user) {
				header("Location:../orders.php");
				}	
			elseif ($ed_order_client) {
				header("Location:../../orders_user.php");
			}
		}
?>