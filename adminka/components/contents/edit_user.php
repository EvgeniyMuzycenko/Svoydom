<content>
  <nav>
    <a href="dashboard.php">Главная панель</a>
    <a href="users.php">Пользователи</a>
    <a href="catalog.php">Каталог</a>
    <a href="projects.php">Проекты</a>
    <a href="orders.php">Заказы</a>
    <a href="gallery.php">Галерея</a>
  </nav>
  <?php
	$edit_user=$_GET['edit_user'];
	$str_out_user="SELECT * FROM `users` WHERE `id`=$edit_user";
	$run_out_user=mysqli_query($connect,$str_out_user);
	$out_user=mysqli_fetch_array($run_out_user);

	$gender=$out_user['gender'];

	switch ($gender) {
		case 'f':
			$gender_f="checked";
			break;
		case 'm':
			$gender_m="checked";
			break;
		default:
			// code...
			break;
	}
?>
  <article>
    <h2>Изменить пользователя <?=$out_user['name']?> <?=$out_user['fam']?></h2>
    <div class="reg_form">
      <form method="POST" enctype="multipart/form-data" action="controllers/edit.php?edit_user=<?=$out_user['id']?>">
        <input type="text" name="fam" placeholder="Фамилия" value="<?php echo $out_user['fam']?>">
        <input type="text" name="name" placeholder="Имя" value="<?php echo $out_user['name']?>">
        <input type="text" name="l_name" placeholder="Отчество" value="<?php echo $out_user['l_name']?>">
        <input type="date" name="birthday" placeholder="Дата рождения" value="<?php echo $out_user['birthday']?>">
        <input type="text" name="mail" placeholder="Электронная почта" value="<?php echo $out_user['mail']?>">
        <input type="text" name="login" placeholder="Логин" value="<?php echo $out_user['login']?>">
        <input type="password" name="pass" placeholder="Пароль">
        <input type="password" name="repass" placeholder="Повторите пароль">
        <input type="radio" name="gender" value="m" <?=$gender_m?>>М<br>
        <input type="radio" name="gender" value="f" <?=$gender_f?>>Ж<br>
        Аватар:<br>
        <input type="file" name="avatar">
        <textarea name="about_user" placeholder="О себе..."><?php echo $out_user['about_user'];?></textarea><br>
        <input type="submit" name="ed_user" value="Сохранить">
      </form>
      <?php
		if ($_SESSION['error']) {
			$color_mess="red"; 
		}
		elseif ($_SESSION['message']) {
			$color_mess="green";
		}
		?>
      <font color="<?=$color_mess?>">
        <?php 
			echo $_SESSION['message'];
			echo $_SESSION['error'];

			unset($_SESSION['message']);
			unset($_SESSION['error']);
		?>
      </font>
    </div>
  </article>
</content>