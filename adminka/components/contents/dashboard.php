<content>
	<nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="catalog.php">Каталог</a>
		<a href="projects.php">Проекты</a>
		<a href="orders.php">Заказы</a>
		<a href="gallery.php">Галерея</a>
	</nav>
	<article class="db_panel">
		<div class="panel">
			Всего пользователей
		<?php
		$str_out_user="SELECT * FROM `users`";
		$run_out_user=mysqli_query($connect,$str_out_user);
		?>
			<p><? echo mysqli_num_rows($run_out_user);?></p>
		</div>
		<div class="panel">
			Всего проектов
		<?php
		$str_out_proj="SELECT * FROM `projects`";
		$run_out_proj=mysqli_query($connect,$str_out_proj);
		?>
			<p><? echo mysqli_num_rows($run_out_proj);?></p>
		</div>
		<div class="panel">
			Всего каталогов
		<?php
		$str_out_cat="SELECT * FROM `catalog`";
		$run_out_cat=mysqli_query($connect,$str_out_cat);
		?>
			<p><? echo mysqli_num_rows($run_out_cat);?></p>
		</div>
		<div class="panel">
			Всего заказов
		<?php
		$str_out_order="SELECT * FROM `orders`";
		$run_out_order=mysqli_query($connect,$str_out_order);
		?>
			<p><? echo mysqli_num_rows($run_out_order);?></p>
		</div>
	</article>
</content>