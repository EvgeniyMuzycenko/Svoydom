<?php
	include "../../controllers/db.php";

	$edit_status_proj=$_GET['edit_status_proj'];
	$edit_status_cat=$_GET['edit_status_cat'];
	$edit_status_user=$_GET['edit_status_user'];
	$edit_status_order=$_GET['edit_status_order'];
	$edit_status_gal=$_GET['edit_status_gal'];

	if ($edit_status_proj) {
		$edit_id=$edit_status_proj;
		$table='projects';
		$file="projects.php";
	}

		if ($edit_status_cat) {
		$edit_id=$edit_status_cat;
		$table='catalog';
		$file="catalog.php";
	}

		if ($edit_status_user) {
		$edit_id=$edit_status_user;
		$table='users';
		$file="users.php";
	}

		if ($edit_status_order) {
		$edit_id=$edit_status_order;
		$table='orders';
		$file="orders.php";
	}

		if ($edit_status_gal) {
		$edit_id=$edit_status_gal;
		$table='gallery';
		$file="gallery.php";
	}

	$str_edit="SELECT * FROM `$table` WHERE id=$edit_id";
	$run_edit=mysqli_query($connect,$str_edit);
	$out_edit=mysqli_fetch_array($run_edit);

	if ($out_edit['status']==0) {
		$status=1;
	}
	elseif ($out_edit['status']==1) {
		$status=0;
	}

	$str_upd="UPDATE `$table` SET `status` = '$status' WHERE id=$edit_id";
	if ($run_upd=mysqli_query($connect,$str_upd)) {
		header("Location:../$file");
	}
?>