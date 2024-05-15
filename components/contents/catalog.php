<content>
	<div class="title"><h2>Каталог проектов</h2></div>
		<div class="articles">

		<?php
			$str_out_cat="SELECT * FROM `catalog` WHERE status=1";
			$run_out_cat=mysqli_query($connect,$str_out_cat);
					
					while ($out_cat=mysqli_fetch_array($run_out_cat)) {
					echo "
					<a href=projects.php?id=$out_cat[id]><img src=assets/images/catalog/$out_cat[img_cat] width=370 alt=Изображение проекта><p>Проекты на $out_cat[name_cat]</p><br></a>";
					}
					?>
		</div>
</content>