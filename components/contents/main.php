<content class="main_page">
<div class="title"><h2>Популярные проекты</h2></div>
	<div class="main_articles">
		<?php
			$str_out_proj_order="SELECT proj_id FROM `orders` GROUP BY proj_id HAVING COUNT(*)>1";
			$run_out_proj_order=mysqli_query($connect,$str_out_proj_order);
			$out_proj_order=mysqli_fetch_array($run_out_proj_order);

			do {
				$id_proj=$out_proj_order['proj_id'];
				$str_out_proj="SELECT * FROM `projects` WHERE id=$id_proj";
				$run_out_proj=mysqli_query($connect,$str_out_proj);
				$out_proj=mysqli_fetch_array($run_out_proj);

					echo "
					<a href=card_product.php?id=$out_proj[id]&id_cat=$out_proj[id_cat]><img src=assets/images/projects/$out_proj[img_proj] width=370 alt=Изображение проекта><p>Проект PR-$out_proj[code]: $out_proj[name_proj]<br> материал: $out_proj[materials], площадь: $out_proj[total_area]м2</p><br></a>";
			 } while ($out_proj_order=mysqli_fetch_array($run_out_proj_order)); 	
				?>
		</div>
	<a class="btn_to_catalog" href="catalog.php">Перейти в каталог</a>
	<div class="advantages">
<div class="advantages_item"><b>268</b><p>построенных объектов</p></div>
<div class="advantages_item"><b>17400 м<sup>2</sup></b><p>введено жилья</p></div>
<div class="advantages_item"><b>12 лет</b><p>в строительной сфере</p></div>
<div class="advantages_item"><b>5 лет</b><p>гарантии на дома</p></div>
</div>
</content>