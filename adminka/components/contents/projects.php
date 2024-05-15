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
		<h2>Проекты</h2>
		<div class="reg_form">
			<h3>Добавить проект</h3>
			<form method="POST" enctype="multipart/form-data">
				<input type="text" name="name_proj" placeholder="Наименование проекта">
				<input type="number" name="code" placeholder="Код проекта">
				<input type="text" name="type_of_house" placeholder="Тип">
				<input type="number" name="num_of_floors" placeholder="Кол-во этажей">
				<input type="text" name="total_area" placeholder="Общая площадь">
				<input type="text" name="materials" placeholder="Материал">
				<input type="text" name="dimensions" placeholder="Габариты">
				<input type="number" name="price" placeholder="Цена"><br>
				Выберите категорию
				<br><select name="id_cat">
					<?php
					$str_out_cat="SELECT * FROM `catalog`";
					$run_out_cat=mysqli_query($connect,$str_out_cat);

					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
						echo "
						<option value=$out_cat[id]>$out_cat[name_cat]</option>
						";
					}
					?>
					
				</select><br><br>
				Изображение:<br>
				<input type="file" name="img_proj">
				<input type="file" name="img_fp">
				<textarea name="description" placeholder="Описание"></textarea><br>
				<input type="submit" name="add_proj" value="Добавить проект">

				<?php
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

				$full_path1="../assets/images/projects/$name_img_proj";
				$full_path2="../assets/images/projects/$name_img_fp";
				/*echo $full_path1;
				echo $full_path2;*/


				$str_add_proj="INSERT INTO `projects`(`id_cat`, `code`, `name_proj`, `img_proj`, `type_of_house`, `num_of_floors`, `total_area`, `materials`, `dimensions`, `price`, `description`, `img_fp`) VALUES ('$id_cat','$code','$name_proj','$name_img_proj','$type_of_house','$num_of_floors','$total_area','$materials','$dimensions','$price','$description','$name_img_fp');";
				/*echo $str_add_proj;*/

		if ($add_proj) {
			if($type=='image/png') {
				if($size<600000) {
					if ($name_proj) {
						$run_add_proj=mysqli_query($connect,$str_add_proj);
						echo"Запрос выполнен"; 
						if ($run_add_proj) {
							move_uploaded_file($tmp_name, $full_path1);
							move_uploaded_file($tmp_name_fp, $full_path2);
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
		<th>Код проекта</th>
		<th>Наименование</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Фасад</th>
		<th>План этажа</th>
		<th>Тип</th>
		<th>Кол-во этажей</th>
		<th>Общая площадь</th>
		<th>Материал стен</th>
		<th>Габариты</th>
		<th>Описание</th>
		<th>Статус</th>
		<th colspan="3">Действия</th>
	</tr>
	<?php
	$out_lim=$_GET['p']*6;

	$str_out_proj_all="SELECT * FROM `projects`";
	$run_out_proj_all=mysqli_query($connect,$str_out_proj_all);
	$num_rows_proj=mysqli_num_rows($run_out_proj_all);

	$str_out_proj="SELECT * FROM `projects` LIMIT $out_lim,6";
	$run_out_proj=mysqli_query($connect,$str_out_proj);
	while ($out_proj=mysqli_fetch_array($run_out_proj)) {
		$status_proj=$out_proj['status'];

		switch ($status_proj) {
			case '1':
			$status_proj="Активен";
			$action_text="Скрыть";
			break;
			case '0':
			$status_proj="Скрыт";
			$action_text="Показать";
			break;
			default:
					// code...
			break;
		}

		$str_out_cat="SELECT * FROM `catalog` WHERE `id`=$out_proj[id_cat]";
		$run_out_cat=mysqli_query($connect,$str_out_cat);
		$out_cat=mysqli_fetch_array($run_out_cat);

		echo "
		<tr>
		<td>$out_proj[id]</td>
		<td>$out_proj[code]</td>
		<td>$out_proj[name_proj]</td>
		<td>$out_proj[price]</td>
		<td>$out_cat[name_cat]</td>
		<td>$out_proj[img_proj]</td>
		<td>$out_proj[img_fp]</td>
		<td>$out_proj[type_of_house]</td>
		<td>$out_proj[num_of_floors]</td>
		<td>$out_proj[total_area]</td>
		<td>$out_proj[materials]</td>
		<td>$out_proj[dimensions]</td>
		<td>$out_proj[description]</td>
		<td>$status_proj</td>
		<td>
		<a href='controllers/edit_status.php?edit_status_proj=$out_proj[id]' class=off>
		$action_text
		</a>	
		</td>
		<td>
		<a href='edit_projects.php?edit_proj=$out_proj[id]' class=change>
		Изменить
		</a>	
		</td>
		<td>
		<a href='controllers/del.php?del_proj=$out_proj[id]' class=delete>
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
		$qty1=$num_rows_proj/6;
		$qty2=floor($qty1);
		$qty3=$num_rows_proj%6;

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