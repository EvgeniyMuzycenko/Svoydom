<content>
<div class="title"><h2>Мои данные</h2></div>
	<div class="profile">
		<div class="value_profile">
				<img src="assets/images/users/<?=$out_user['avatar']?>" height="150" alt="Изображение профиля">
				<?php
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
				?>
				<table>
					<?php
					$out_date="SELECT DATE_FORMAT(birthday,'%d-%m-%Y') AS birhday FROM users";
					?>
					<tr>
						<td><b>ФИО: </b>
							<?php
							echo "$out_user[fam] $out_user[name] $out_user[l_name]"
						?>
					</td>
					<tr>
						<td><b>Логин: </b><?="$out_user[login]"?></td>
					</tr>
					<tr>
						<td><b>Пол: </b><?="$gender"?></td>
					<tr>
						<td><b>Дата рождения: </b>
						<?php
							$time=$out_user['birthday'];
							$time=strtotime($time);
							echo strftime("%d.%m.%Y",$time); 
						?>
				</td>
					</tr>
					<tr>
						<td colspan="2">
							<b>О себе:</b><br>
							<?="$out_user[about_user]"?>
						</td>
					</tr>
				</table><br>

			<div class="menu_prof">
				<a class="btn_to_orders" href="orders_user.php">Мои заказы</a>
					<?php
	echo
		"<a class=btn_edit_profile href=edit_profile.php?edit_prof=$out_user[id]>Редактировать профиль</a>";
	?>	
		</div>
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
	</div>
</content>