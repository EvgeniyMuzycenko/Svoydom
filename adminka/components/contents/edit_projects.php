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
	$edit_proj=$_GET['edit_proj'];
	$str_out_proj="SELECT * FROM `projects` WHERE `id`=$edit_proj";
	$run_out_proj=mysqli_query($connect,$str_out_proj);
	$out_proj=mysqli_fetch_array($run_out_proj);
	?>

  <article>
    <h2>Изменить проект PR-<?=$out_proj['code']?> <?=$out_proj['name_proj']?></h2>
    <div class="reg_form">
      <form method="POST" enctype="multipart/form-data" action="controllers/edit.php?edit_proj=<?=$out_proj['id']?>">
        <input type="text" name="name_proj" value="<?php echo $out_proj['name_proj'];?>"
          placeholder="Наименование проекта">
        <input type="number" name="code" value="<?php echo $out_proj['code'];?>" placeholder="Код проекта">
        <input type="text" name="type_of_house" value="<?php echo $out_proj['type_of_house'];?>" placeholder="Тип">
        <input type="number" name="num_of_floors" value="<?php echo $out_proj['num_of_floors'];?>"
          placeholder="Кол-во этажей">
        <input type="text" name="total_area" value="<?php echo $out_proj['total_area'];?>" placeholder="Общая площадь">
        <input type="text" name="materials" value="<?php echo $out_proj['materials'];?>" placeholder="Материал">
        <input type="text" name="dimensions" value="<?php echo $out_proj['dimensions'];?>" placeholder="Габариты">
        <input type="number" name="price" value="<?php echo $out_proj['price'];?>" placeholder="Цена"><br>
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
        <textarea name="description" placeholder="Описание"><?php echo $out_proj['description'];?></textarea><br>
        <input type="submit" name="edit_proj" value="Сохранить">
      </form>
    </div>
  </article>
</content>