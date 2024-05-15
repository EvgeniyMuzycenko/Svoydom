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
		<h2>Галерея</h2>
		<div class="reg_form">
			<h3>Добавить изображение в галерею</h3>
			<form method="POST" enctype="multipart/form-data">
				Изображение:<br>
				<input type="file" name="img_gal">
				<input type="submit" name="add_gal" value="Добавить изображение">

		<?php
			$img_gal=$_POST['img_gal'];
      $add_gal=$_POST['add_gal'];

      $name_img_gal=$_FILES['img_gal']['name'];
			$type=$_FILES['img_gal']['type'];
			$tmp_name=$_FILES['img_gal']['tmp_name'];
			$size=$_FILES['img_gal']['size'];

			$full_path="../assets/images/gallery/$name_img_gal";
			/*echo $full_path;*/
			
			$str_add_gal="INSERT INTO `gallery`(`img_gal`) VALUES ('$name_img_gal');";
			/*echo $str_add_gal;*/
			
			if ($add_gal) {
				if($type=='image/jpeg') {
					if($size<600000) {
					$run_add_gal=mysqli_query($connect,$str_add_gal);
					echo"Запрос выполнен"; 
				if ($run_add_gal) {
					move_uploaded_file($tmp_name, $full_path);
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
		?>
			</form>
		</div>

		<table>
			<tr>
				<th>№ п/п</th>
				<th>Изображение</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
<?php
			$out_lim=$_GET['p']*6;

			$str_out_gal_all="SELECT * FROM `gallery`";
			$run_out_gal_all=mysqli_query($connect,$str_out_gal_all);

			$num_rows_gal=mysqli_num_rows($run_out_gal_all);

			$str_out_gal="SELECT * FROM `gallery` LIMIT $out_lim,6";
			$run_out_gal=mysqli_query($connect,$str_out_gal);
       		while ($out_gal=mysqli_fetch_array($run_out_gal)) {

       			$status=$out_gal['status'];
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
       					break;
       			}

       			echo "
       		<tr>
				<td>$out_gal[id]</td>
				<td>$out_gal[img_gal]</td>
				<td>$status</td>
				<td>
					<a href='controllers/edit_status.php?edit_status_gal=$out_gal[id]' class=off>
						$action_text
					</a>	
				</td>
				<td>
					<a href='controllers/del.php?del_gal=$out_gal[id]' class=delete>
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
				$qty1=$num_rows_gal/6;
				$qty2=floor($qty1);
				$qty3=$num_rows_gal%6;

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