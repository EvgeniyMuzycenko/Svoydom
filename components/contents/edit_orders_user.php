<content>
  <div class="title">
    <h2>Мои заказы</h2>
  </div>
  <div class="profile">
    <div class="menu_prof">
      <a href="profile.php">Мои данные</a>
      <a href="orders_user.php">Мои заказы</a>
    </div>
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
		<div class=value_profile>
		<h3>Уважаемый покупатель,<br>$out_user[fam] $out_user[name] $out_user[l_name] ($out_user[login])</h3><br>"
		?>

    <?php
			$str_out_ord="SELECT * FROM `projects`";
			$run_out_ord=mysqli_query($connect,$str_out_ord);
			$out_ord=mysqli_fetch_array($run_out_ord);
			?>
    <form method="POST" enctype="multipart/form-data" action="adminka/controllers/edit.php?edit_order=<?=$edit_order?>">

      <h4>Выберите из списка другой заказ</h4><br>
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
      </select>
      <br>
      <input type="submit" name="edit_order_client" value="Сохранить">
    </form>
  </div>
  </div>
</content>