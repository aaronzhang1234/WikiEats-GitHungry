<?php
	$connection = new mysqli("localhost", "root", "", "recipes");

	if($connection->connect_error){
		die("Error: ".$connection->connect_error);
	}
	
	session_start();
	if(!isset($_SESSION["userID"])||!isset($_POST["Title"])){
		header('Location: ../MainPages/404.php');
		exit();
	}
	echo $_POST["Title"];
	echo $_POST["review"];
	echo $_POST["rating"];
	echo $_SESSION["userID"];
	echo $_SESSION['recipeID'];
	
	$sql = "INSERT INTO REVIEWS(reviewTest,userid,recipeid,rating,title)
			VALUES ('".$_POST['review']."','".$_SESSION['userID']."','".$_SESSION['recipeID']."','".$_POST['rating']."','".$_POST['Title']."')";
			
	if($connection->query($sql)==TRUE){
		echo "added!";
		$lad=1;
	}
	else{
		echo "sad :(";
		$lad=1;
	
	}
	
	if(isset($lad)){
		header('Location:'.$_SERVER['HTTP_REFERER']);
		exit();
	}

?>