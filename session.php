<?php
session_start();

include_once 'sql/dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
	$query = $DBcon->query("SELECT * FROM contestants WHERE constNumber =".$_SESSION['userSession']);
	$conRow=$query->fetch_row();
	//echo $conRow[0];
	$DBcon->close();
?>