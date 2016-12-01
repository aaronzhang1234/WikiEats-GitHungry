<?php
	// TO DO: Be verification for Login.php (displays user login if invalid)

	$username="root";$password="";$database="recipes";
	$mysqli= mysql_connect('localhost',$username,$password);

	mysql_select_db($database,$mysqli);
	
	
	
	
	
	
	
	// Gets username from database onto the session
	session_start();
	
	$sqlfind="SELECT userid FROM users WHERE username ='".$_POST['username']."' 
			  AND password =MD5('".$_POST['password']."')";
	
	$result = mysql_query($sqlfind);
	
	
	if($finder=mysql_result($result,0)){
		echo "worked";
	}
	else
	{
		echo "wrong";
		header('Location: ../wronglogin.php');
		exit();
	}
	
	
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["userID"] = getUserID($_POST["username"]);
	
	
	// Gets username from the database
	function getUserID($username)
	{
		$sql = "Select userid from users
			Where username = '".$username."'";
			
		$result = mysql_query($sql);
	
		$userid = mysql_result($result,0);
		
		return $userid;
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