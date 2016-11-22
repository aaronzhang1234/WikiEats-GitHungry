<?php
	// TO DO: Be verification for Login.php (displays user login if invalid)

	// Gets username from database onto the session
	session_start();
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["userID"] = getUserID();

	// Gets username from the database
	function getUserID()
	{
		return 0;
	}

	header('Location: ../WikiEats.php');
	exit();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

		<!--<link href="chapter12-project02.css" rel="stylesheet">-->
	</head>

	<body>
		<?php echo $_SESSION["username"].' '.$_SESSION["userID"]; ?>
	</body>
</html>