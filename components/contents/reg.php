<content>
  <div class="title">
    <h2>Регистрация</h2>
  </div>
  <div class="reg_form">
    <form method="POST" action="adminka/controllers/registration.php" enctype="multipart/form-data">
      <input type="text" name="fam" placeholder="Фамилия">
      <input type="text" name="name" placeholder="Имя">
      <input type="text" name="l_name" placeholder="Отчество">
      <input type="date" name="birthday" placeholder="Дата рождения">
      <input type="text" name="mail" placeholder="Электронная почта">
      <input type="text" name="login" placeholder="Логин">
      <input type="password" name="pass" placeholder="Пароль">
      <input type="password" name="repass" placeholder="Повторите пароль">
      <input type="radio" name="gender" value="m">М
      <input type="radio" name="gender" value="f">Ж<br>
      Аватар:<br>
      <input type="file" name="avatar">
      <textarea name="about_user" placeholder="О себе..."></textarea><br>
      <input type="submit" name="reg" value="Регистрация">
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
</content>