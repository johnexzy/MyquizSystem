<?php
	session_start();
	if ($_SESSION['userSession']) {
		unset($_SESSION['userSession']);
		session_destroy();
	}
	
	header("location: index.php");
?>