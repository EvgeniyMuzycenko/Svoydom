<?php
session_start();
session_unset();
$_SESSION['message_exit']="Вы вышли!";
	header("Location:/");
?>