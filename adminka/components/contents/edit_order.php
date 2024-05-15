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
			$edit_order=$_GET['edit_order'];

			$str_out_user_order="SELECT DISTINCT `user_id` FROM `orders` WHERE id=$edit_order";
			$run_out_user_order=mysqli_query($connect,$str_out_user_order);
			$out_user_order=mysqli_fetch_array($run_out_user_order);
			$id_user_order=$out_user_order['user_id'];

			$str_out_user="SELECT * FROM `users` WHERE id=$id_user_order";
			$run_out_user=mysqli_query($connect,$str_out_user);
			$out_user=mysqli_fetch_array($run_out_user);

			$str_out_proj_order="SELECT * FROM `orders` WHERE id=$edit_order";
			$run_out_proj_order=mysqli_query($connect,$str_out_proj_order);
			$out_proj_order=mysqli_fetch_array($run_out_proj_order);

			$id_proj=$out_proj_order['proj_id'];
			$str_out_proj="SELECT * FROM `projects` WHERE id=$id_proj";
			$run_out_proj=mysqli_query($connect,$str_out_proj);
			$out_proj=mysqli_fetch_array($run_out_proj);

echo "
	<article>
		<h2>Изменить заказ пользователя $out_user[fam] $out_user[name] $out_user[l_name] - $out_user[login]</h2>"
		?>
		<div class="reg_form">
			<?php
			$str_out_ord="SELECT * FROM `projects`";
			$run_out_ord=mysqli_query($connect,$str_out_ord);
			$out_ord=mysqli_fetch_array($run_out_ord);
			?>
			<form method="POST" enctype="multipart/form-data" action="controllers/edit.php?edit_order=<?=$edit_order?>">
	
		Выберите из списка другой заказ<br>
			<select name="proj_id">
				<?php
				$str_out_ord="SELECT * FROM `projects`";
				$run_out_ord=mysqli_query($connect,$str_out_ord);
				while ($out_ord=mysqli_fetch_array($run_out_ord)) {
				echo "
					<option value=$out_ord[id]>$out_ord[name_proj]</option><br>
						";
					}
					?>
					<br>
				<input type="submit" name="edit_order_user" value="Сохранить">
			</form>
	</article>
</content>