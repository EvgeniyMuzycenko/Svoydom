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
		<h2>Каталоги</h2>
		<div class="reg_form">
			<h3>Добавить каталог</h3>
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="name_cat" placeholder="Наименование">
				Изображение:<br>
				<input type="file" name="img_cat">
				<input type="submit" name="add_cat" value="Добавить каталог">

		<?php
			$name_cat=$_POST['name_cat'];	
			$img_cat=$_POST['img_cat'];
      $add_cat=$_POST['add_cat'];

      $name_img_cat=$_FILES['img_cat']['name'];
			$type=$_FILES['img_cat']['type'];
			$tmp_name=$_FILES['img_cat']['tmp_name'];
			$size=$_FILES['img_cat']['size'];

			$full_path="../assets/images/catalog/$name_img_cat";
			/*echo $full_path;*/
			
			$str_add_cat="INSERT INTO `catalog`(`name_cat`, `img_cat`) VALUES ('$name_cat','$name_img_cat');";
			/*echo $str_add_cat;*/
			
			if ($add_cat) {
				if($type=='image/png') {
					if($size<600000) {
						if ($name_cat) {
					$run_add_cat=mysqli_query($connect,$str_add_cat);
					echo"Запрос выполнен"; 
				if ($run_add_cat) {
					move_uploaded_file($tmp_name, $full_path);
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
		?>
			</form>
		</div>

		<table>
			<tr>
				<th>№ п/п</th>
				<th>Наименование</th>
				<th>Изображение</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
<?php
			$out_lim=$_GET['p']*6;

			$str_out_cat_all="SELECT * FROM `catalog`";
			$run_out_cat_all=mysqli_query($connect,$str_out_cat_all);

			$num_rows_cat=mysqli_num_rows($run_out_cat_all);

			$str_out_cat="SELECT * FROM `catalog` LIMIT $out_lim,6";
			$run_out_cat=mysqli_query($connect,$str_out_cat);
       		while ($out_cat=mysqli_fetch_array($run_out_cat)) {

       			$status=$out_cat['status'];
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
				<td>$out_cat[id]</td>
				<td>$out_cat[name_cat]</td>
				<td>$out_cat[img_cat]</td>
				<td>$status</td>
				<td>
					<a href='controllers/edit_status.php?edit_status_cat=$out_cat[id]' class=off>
						$action_text
					</a>	
				</td>
				<td>
					<a href='edit_catalog.php?edit_cat=$out_cat[id]' class=change>
						Изменить
					</a>	
				</td>
				<td>
					<a href='controllers/del.php?del_cat=$out_cat[id]' class=delete>
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
				$qty1=$num_rows_cat/6;
				$qty2=floor($qty1);
				$qty3=$num_rows_cat%6;

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