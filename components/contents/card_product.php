<content>
	<div class="card_product">
		<?php
		$id_cat=$_GET['id'];
		$str_out_cat="SELECT * FROM `projects` WHERE id=$id_cat";
		$run_out_cat=mysqli_query($connect,$str_out_cat);
		if ($out_cat=mysqli_fetch_array($run_out_cat)) {	
    echo "
	<div class=slider>
 	 <div class=item>
    <img src=assets/images/projects/$out_cat[img_proj]> alt=Изображение проекта
 	 </div>
  <div class=item>
    <img src=assets/images/projects/$out_cat[img_fp]> alt=Изображение проекта
  </div>
  <a class=previous onclick=previousSlide()>&#10094;</a>
  <a class=next onclick=nextSlide()>&#10095;</a>
	</div>"		
			?>
			
			<div class="box_specifications">
				<?php
				echo "
				<h2>Проект PR-$out_cat[code]: $out_cat[name_proj]</h2><br>";
			}
			?>
			<h3>Характеристики:</h3>
			<table class="table_sp">
				<tr>
					<td>Тип........................................</td>
					<td>      
						<?php
						echo "$out_cat[type_of_house]";
					?></td>
				</tr>
				<tr>
					<td>Кол-во этажей.....................</td>
					<td>
						<?php
						echo "$out_cat[num_of_floors]";
					?></td>
				</tr>
				<tr>
					<td>Общая площадь..................</td>
					<td>
						<?php
						echo "$out_cat[total_area] м<sup>2</sup>";
					?></td>
				</tr>
				<tr>
					<td>Материалы стен..................</td>
					<td>
						<?php
						echo "$out_cat[materials]";
					?></td>
				</tr>
				<tr>
					<td>Габариты для плана...........</td>
					<td>
						<?php
						echo "$out_cat[dimensions] м";
						?>
					</td>
				</tr>
				<tr>
					<td>Цена......................................</td>
					<td>
						<?php
						echo number_format($out_cat['price'], 0, '', ' ');
					?> р.
				</th>
			</tr>
		</table>
		<br>

		<h3>Описание проекта:</h3>
		<?php
		echo "<p>$out_cat[description]</p>";
		?>
	
	<?php

	if ($_SESSION['client'] OR $_SESSION['user']) {
		
		echo "
		<a class=btn_open_order href=controllers/order.php?proj_id=$out_cat[id]>Заказать</a>";
		?>
		<?php
	}
	?>
	</div>
</div>
</content>
