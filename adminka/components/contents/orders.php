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
    <h2>Заказы</h2>
    <?php
		/*ВЫВОДИМ КОЛИЧЕСТВО УНИКАЛЬНЫХ КЛИЕТОВ*/
			$out_lim=$_GET['p']*2;

			$str_out_user_order_all="SELECT DISTINCT `user_id` FROM `orders`";
			$run_out_user_order_all=mysqli_query($connect,$str_out_user_order_all);

			$num_rows_users=mysqli_num_rows($run_out_user_order_all);

			$str_out_user_order="SELECT DISTINCT `user_id` FROM `orders` LIMIT $out_lim,2";
			$run_out_user_order=mysqli_query($connect,$str_out_user_order);

			while ($out_user_order=mysqli_fetch_array($run_out_user_order)) {
				$id_user_order=$out_user_order['user_id'];
				/*ВЫВОД ДАННЫХ КЛИЕТОВ*/
				$str_out_user="SELECT * FROM `users` WHERE id=$id_user_order";
				$run_out_user=mysqli_query($connect,$str_out_user);
				$out_user=mysqli_fetch_array($run_out_user);

				echo "<br><h4>$out_user[fam] $out_user[name] $out_user[l_name] - $out_user[login]</h4>";

				echo "			
				<table>
				<tr>
					<th>№ п/п</th>
					<th>Проект</th>
					<th>Статус</th>
					<th>Время заказа</th>
					<th>Время <br>изменения заказа</th>
					<th colspan=3>Действия</th>
				</tr>";

				/*ВЫВОДИМ КОЛИЧЕСТВО ТОВАРОВ У КЛИЕНТА*/
				$str_out_proj_order="SELECT * FROM `orders` WHERE user_id=$id_user_order";
				$run_out_proj_order=mysqli_query($connect,$str_out_proj_order);

				$i=0;
				while($out_proj_order=mysqli_fetch_array($run_out_proj_order)) {
					$i++;

					/*ВЫВОДИМ НАИМЕНОВАНИЕ ТОВАРОВ У КЛИЕНТА*/
					$id_proj=$out_proj_order['proj_id'];
					$str_out_proj="SELECT * FROM `projects` WHERE id=$id_proj";
					$run_out_proj=mysqli_query($connect,$str_out_proj);
					$out_proj=mysqli_fetch_array($run_out_proj);

						$datetime_bd_crd=$out_proj_order['created_at'];
						$datetime_bd_upd=$out_proj_order['update_at'];

						$datetime_crd=explode(" ", $datetime_bd_crd);
						$datetime_upd=explode(" ", $datetime_bd_upd);

						$date_crd=explode("-", $datetime_crd['0']);
						$date_upd=explode("-", $datetime_upd['0']);

						$time_crd=explode(":", $datetime_crd['1']);
						$time_upd=explode(":", $datetime_upd['1']);

						$d_crd=$date_crd['2'];
						$m_crd=$date_crd['1'];
						$y_crd=$date_crd['0'];

						$d_upd=$date_upd['2'];
						$m_upd=$date_upd['1'];
						$y_upd=$date_upd['0'];

						$hour_crd=$time_crd['0'];
						$min_crd=$time_crd['1'];
						$sec_crd=$time_crd['2'];

						$hour_upd=$time_upd['0'];
						$min_upd=$time_upd['1'];
						$sec_upd=$time_upd['2'];

						switch ($m) {
							case '01':
								$m="января";
								break;
							case '02':
								$m="февраля";
								break;
							case '03':
								$m="марта";
								break;
							case '04':
								$m="апреля";
								break;
							case '05':
								$m="мая";
								break;
							case '06':
								$m="июня";
								break;
							case '07':
								$m="июля";
								break;
							case '08':
								$m="августа";
								break;
							case '09':
								$m="сентября";
								break;
							case '10':
								$m="октября";
								break;
							case '11':
								$m="ноября";
								break;
							case '12':
								$m="декабря";
								break;
							
							default:
								// code...
								break;
						}

				$status=$out_proj_order['status'];
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
				echo "
				<tr>
					<td>$i</td>
					<td>$out_proj[name_proj]</td>
					<td>$status</td>
					<td>$d_crd.$m_crd.$y_crd <br>в $hour_crd:$min_crd</td>
					<td>$d_upd.$m_upd.$y_upd <br>в $hour_upd:$min_upd</td>
					<td>
						<a href='controllers/edit_status.php?edit_status_order=$out_proj_order[id]' class=off>
							$action_text
						</a>	
					</td>
					<td>
						<a href='edit_order.php?edit_order=$out_proj_order[id]' class=change>
							Изменить
						</a>	
					</td>
					<td>
						<a href='controllers/del.php?del_order=$out_proj_order[id]' class=delete>
							Удалить
						</a>	
					</td>
				</tr>
			";
		}
			echo "</table>";
			}
		?>
    <div class="pagination">
      <?php
		$qty1=$num_rows_users/2;
		$qty2=floor($qty1);
		$qty3=$num_rows_users%2;

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