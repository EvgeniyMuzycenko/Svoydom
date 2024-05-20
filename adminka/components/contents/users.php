<content>
  <nav>
    <a href="dashboard.php">Главная панель</a>
    <a href="users.php">Пользователи</a>
    <a href="catalog.php">Каталог</a>
    <a href="projects.php">Проекты</a>
    <a href="orders.php">Заказы</a>
    <a href="gallery.php">Галерея</a>
  </nav>
  <article>
    <h2>Пользователи</h2>
    <div class="reg_form">
      <h3>Добавить пользователя</h3>
      <form method="POST" enctype="multipart/form-data" action="controllers/registration.php">
        <input type="text" name="fam" placeholder="Фамилия">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="l_name" placeholder="Отчество">
        <input type="date" name="birthday" placeholder="Дата рождения">
        <input type="text" name="mail" placeholder="Электронная почта">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        <input type="password" name="repass" placeholder="Повторите пароль">
        <input type="radio" name="gender" value="m">М<br>
        <input type="radio" name="gender" value="f">Ж<br>
        Аватар:<br>
        <input type="file" name="avatar">
        <textarea name="about_user" placeholder="О себе..."></textarea><br>
        <input type="submit" name="add_user" value="Добавить пользователя">
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
    <table>
      <tr>
        <th>№ п/п</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Логин</th>
        <th>Почта</th>
        <th>Пол</th>
        <th>Аватар</th>
        <th>Обо мне</th>
        <th>Роль</th>
        <th>Статус</th>
        <th colspan="3">Действия</th>
      </tr>
      <?php
				$out_lim=$_GET['p']*5;

				$str_out_users_all="SELECT * FROM `users`";
				$run_out_user_all=mysqli_query($connect,$str_out_users_all);
				$num_rows_users=mysqli_num_rows($run_out_user_all);

				$str_out_users="SELECT * FROM `users` LIMIT $out_lim,5";
				$run_out_user=mysqli_query($connect,$str_out_users);
				while ($out_user=mysqli_fetch_array($run_out_user)) {

					$gender=$out_user['gender'];
					$role=$out_user['role'];
					switch ($gender) {
						case 'm':
							$gender="Мужской";
							break;
						case 'f':
							$gender="Женский";
							break;
						default:
							$gender="Не определен";
							break;
					}

					switch ($role) {
						case '0':
							$role="Пользователь";
							break;
						case '1':
							$role="Модератор";
							break;
						case '2':
							$role="Администратор";
							break;
						default:
							// code...
							break;
					}

				$status=$out_user['status'];
       			switch ($status) {
       				case '1':
       					$status="Активен";
       					$action_text="Скрыть";
       					break;
       				case '0':
       					$status="Скрыт";
       					$action_text="Показать";
       					break;
       				
       				default:
       					// code...
       					break;
       			}

       				$time=$out_user['birthday'];
					$time=strtotime($time);
					$birth_data = strftime("%d.%m.%Y",$time); 

					echo "<tr>
							<td>$out_user[id]</td>
							<td>$out_user[fam]</td>
							<td>$out_user[name]</td>
							<td>$out_user[l_name]</td>
							<td>$birth_data</td>
							<td>$out_user[login]</td>
							<td>$out_user[mail]</td>
							<td>$gender</td>
							<td>$out_user[avatar]</td>
							<td>$out_user[about_user]</td>
							<td>$role</td>
							<td>$status</td>
							<td>
					<a href='controllers/edit_status.php?edit_status_user=$out_user[id]' class=off>
						$action_text
					</a>	
				</td>
				<td>
					<a href='edit_user.php?edit_user=$out_user[id]' class=change>
						Изменить
					</a>	
				</td>
				<td>
					<a href='controllers/del.php?del_user=$out_user[id]' class=delete>
						Удалить
					</a>	
				</td>
			</tr>
					";
				}
			?>

    </table>
    <div class="pagination">
      <?php
				$qty1=$num_rows_users/5;
				$qty2=floor($qty1);
				$qty3=$num_rows_users%5;

				if ($qty3>0) {
					$qty2++;
				}

				$p=0;
				for ($i=0; $i < $qty2; $i++) {
					$p++;
					echo "<a href=?p=$i>$p</a>";
				}
			?>
    </div>
  </article>
</content>