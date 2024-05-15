<?php
		session_start();
		if ($_SESSION['client'] OR $_SESSION['user']) {
		include "components/header.php";
		include "components/nav.php";
		include "components/contents/profile.php";
		include "components/footer.php";
		}
		else {
			header("Location:/");
		}
	?>