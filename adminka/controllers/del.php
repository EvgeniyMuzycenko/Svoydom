<?php
	include "../../controllers/db.php";
	$del_cat=$_GET['del_cat'];
	$del_user=$_GET['del_user'];
	$del_proj=$_GET['del_proj'];
	$del_order=$_GET['del_order'];
	$del_gal=$_GET['del_gal'];
	if ($del_cat) {
		$del_id=$del_cat;
		$table='catalog';
		$file="catalog.php";
	}
	elseif ($del_user) {
		$del_id=$del_user;
		$table='users';
		$file="users.php";
	}
	elseif ($del_proj) {
		$del_id=$del_proj;
		$table='projects';
		$file="projects.php";
	}
	elseif ($del_order) {
		$del_id=$del_order;
		$table='orders';
		$file="orders.php";
	}
		elseif ($del_gal) {
		$del_id=$del_gal;
		$table='gallery';
		$file="gallery.php";
	}

	$str_del_cat="DELETE FROM `$table` WHERE id=$del_id";
	$run_del=mysqli_query($connect,$str_del_cat);
	header("Location:../$file");
?>