<content>
  <div class="title">
    <h2>Изменение профиля</h2>
  </div>
  <?php
	$edit_prof=$_GET['edit_prof'];
	$str_out_prof="SELECT * FROM `users` WHERE id=$edit_prof";
	$run_out_prof=mysqli_query($connect,$str_out_prof);
	$out_prof=mysqli_fetch_array($run_out_prof);

	$gender=$out_prof['gender'];

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
  <div class="edit_form">
    <form method="POST" enctype="multipart/form-data"
      action="adminka/controllers/edit.php?edit_user=<?=$out_user['id']?>">
      <input type="text" name="fam" placeholder="Фамилия" value="<?php echo $out_prof['fam']?>">
      <input type="text" name="name" placeholder="Имя" value="<?php echo $out_prof['name']?>">
      <input type="text" name="l_name" placeholder="Отчество" value="<?php echo $out_prof['l_name']?>">
      <input type="date" name="birthday" placeholder="Дата рождения" value="<?php echo $out_prof['birthday']?>">
      <input type="text" name="mail" placeholder="Электронная почта" value="<?php echo $out_prof['mail']?>">
      <input type="text" name="login" placeholder="Логин" value="<?php echo $out_prof['login']?>">
      <input type="password" name="pass" placeholder="Пароль">
      <input type="password" name="repass" placeholder="Повторите пароль">
      <input type="radio" name="gender" value="m" <?=$gender_m?>>М
      <input type="radio" name="gender" value="f" <?=$gender_f?>>Ж<br>
      Аватар:<br>
      <input type="file" name="avatar">
      <textarea name="about_user" placeholder="О себе..."><?php echo $out_prof['about_user'];?></textarea><br>
      <input type="submit" name="ed_prof" value="Сохранить">
    </form>
  </div>
</content>