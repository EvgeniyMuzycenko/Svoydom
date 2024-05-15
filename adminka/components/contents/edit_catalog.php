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
	$edit_cat=$_GET['edit_cat'];
	$str_out_cat="SELECT * FROM `catalog` WHERE `id`=$edit_cat";
	$run_out_cat=mysqli_query($connect,$str_out_cat);
	$out_cat=mysqli_fetch_array($run_out_cat);
	?>

	<article>
		<h2>Изменить категорию</h2>
		<div class="reg_form">
			<form method="POST" enctype="multipart/form-data" action="controllers/edit.php?edit_cat=<?=$out_cat['id']?>">
				<input type="text" name="name_cat" value="<?php echo $out_cat['name_cat'];?>" placeholder="Наименование">
				Изображение:<br>
				<input type="file" name="img_cat">
				<input type="submit" name="edit_cat" value="Сохранить">
			</form>
	</article>
</content>