<?php
include "../controllers/db.php";
session_start();

$proj_id=$_GET['proj_id'];
$user_id=$_SESSION['client']['id'];

$str_add_order="INSERT INTO `orders`(`user_id`, `proj_id`) VALUES ('$user_id','$proj_id')";
$run_add_order=mysqli_query($connect,$str_add_order);

if ($run_add_order) {
	header("Location:../order_success.php?proj_id=$proj_id");
	}
?>