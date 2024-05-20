		<content>
		  <?php
			$id_cat=$_GET['id'];
			$str_out_cat="SELECT * FROM `catalog` WHERE id=$id_cat";
			$run_out_cat=mysqli_query($connect,$str_out_cat);
			$out_cat=mysqli_fetch_array($run_out_cat);	
		?>
		  <div class="title">
		    <h2>Проекты на <?=$out_cat['name_cat']?></h2>
		  </div>
		  <div class="articles">
		    <?php
			$out_cat_id=$out_cat['id'];
			$str_out_proj="SELECT * FROM `projects` WHERE id_cat=$out_cat_id AND status=1";
			$run_out_proj=mysqli_query($connect,$str_out_proj);	

			$rows=mysqli_num_rows($run_out_proj);

			if ($rows > 0) {
			
			while ($out_proj=mysqli_fetch_array($run_out_proj)) {
		
					echo "
					<a href=card_product.php?id=$out_proj[id]&id_cat=$out_proj[id_cat]><img src=assets/images/projects/$out_proj[img_proj] width=370 alt=Изображение проекта><p>Проект PR-$out_proj[code]: $out_proj[name_proj], S = $out_proj[total_area]м2</p><br></a>";
					}
				}
				else {
					echo "<font color=red>В данной категории нет товаров</font>";
				}
				?>
		  </div>
		</content>