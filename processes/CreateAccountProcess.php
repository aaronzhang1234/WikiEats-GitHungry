<?php // Error: creating an account gives the user a userID of 0

$username="root";$password="";$database="recipes";
$mysqli= mysql_connect('localhost',$username,$password);

mysql_select_db($database,$mysqli);

session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<body>
	
		<?php
			echo $_POST['username'];
			echo $_POST['password1'];
			echo $_POST['fName'];
			echo $_POST['lName'];
			
			$sql = "Insert into users (username,password,firstname,lastname)
			Values ('".$_POST['username']."','".$_POST['password1']."','".$_POST['fName']."','".$_POST['lName']."')";
			
			if(mysql_query($sql)){
				echo "added!";
			}
			else{
				echo "sad :(";
			}
		?>
	</body>
</html>