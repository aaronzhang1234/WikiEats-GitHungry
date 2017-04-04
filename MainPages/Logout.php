<?php
	// Logs out user by clearing the SESSION
	session_start();
	$_SESSION["username"] = NULL;
	$_SESSION["userID"] = NULL;

	header('Location: WikiEats.php');
	exit();
?>
