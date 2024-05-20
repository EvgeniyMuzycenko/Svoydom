<content>
  <div class="order_success">
    <h2>Заказ на проект принят!</h2>
    <p>Номер Вашего заказа
      <?php
			$id_proj=$_GET['proj_id'];
			$str_out_proj="SELECT * FROM `projects` WHERE id=$id_proj";
			$run_out_proj=mysqli_query($connect,$str_out_proj);
			$out_proj=mysqli_fetch_array($run_out_proj);
		
				echo "
					PR-$out_proj[code]<br></a>";
					?>
    </p>
  </div>
</content>