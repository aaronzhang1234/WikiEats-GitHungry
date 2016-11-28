<?php
	$username="root";$password="";$database="recipes";
	$mysqli= mysql_connect('localhost',$username,$password);

	mysql_select_db($database,$mysqli);
	
	
	session_start();
	echo $_POST["Title"];
	echo $_POST["review"];
	echo $_POST["rating"];
	echo $_SESSION["userID"];
	echo $_SESSION['recipeID'];
	
	$sql = "INSERT INTO REVIEWS(reviewTest,userid,recipeid,rating,title)
			VALUES ('".$_POST['review']."','".$_SESSION['userID']."','".$_SESSION['recipeID']."','".$_POST['rating']."','".$_POST['Title']."')";
			
			if(mysql_query($sql)){
				echo "added!";
			}
			else{
				echo "sad :(";
			}
	header('Location: ../WikiEats.php');
	exit();
?>