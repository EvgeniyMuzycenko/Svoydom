<content>
  <div class="title">
    <h2>Мои заказы</h2>
  </div>
  <div class="profile">
    <div class="table_orders">
      <table border="1px" width="1000px">
        <tr>
          <th>№ п/п</th>
          <th>Проект</th>
          <th>Изображение</th>
          <th>Время заказа</th>
          <th>Время изменения заказа</th>
          <th>Действия</th>
        </tr>
        <?php
				$user_id=$_SESSION['client']['id'];
				$str_out_orders="SELECT * FROM `orders` WHERE user_id=$user_id";
				$run_out_orders=mysqli_query($connect,$str_out_orders);
				$i=0;
				while ($out_order=mysqli_fetch_array($run_out_orders)) {
 					$i++;
					echo "
						<tr>
							<td>$i</td>
						";
				$str_out_proj="SELECT * FROM `projects` WHERE id=$out_order[proj_id]";
				$run_out_proj=mysqli_query($connect,$str_out_proj);
				$out_proj=mysqli_fetch_array($run_out_proj);

					echo "
							<td>$out_proj[name_proj]</td>
							<td><img src=assets/images/projects/$out_proj[img_proj] width=60 alt=Изображение проекта></td>
						";

						$datetime_bd_crd=$out_order['created_at'];
						$datetime_bd_upd=$out_order['update_at'];

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

							echo "
							<td>$d_crd.$m_crd.$y_crd / $hour_crd:$min_crd</td>
							<td>$d_upd.$m_upd.$y_upd / $hour_upd:$min_upd</td>
							<td><a href=edit_orders_user.php?edit_order=$out_order[id]>Изменить</a></td>
						</tr>
					";
			}
			?>
      </table>
    </div>
  </div>
</content>