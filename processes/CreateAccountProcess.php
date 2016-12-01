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
			
			$sqlfind="SELECT userid FROM users WHERE username ='".$_POST['username']."'";
	
			$result = mysql_query($sqlfind);
			
			
			if($finder=mysql_result($result,0)){
				echo "wrong";
				header('Location: ../wronglogin.php');
				exit();			
			}
			$sql = "Insert into users (username,password,firstname,lastname)
			Values ('".$_POST['username']."',MD5('".$_POST['password1']."'),'".$_POST['fName']."','".$_POST['lName']."')";
			
			if(mysql_query($sql)){
				echo "added!";
			}
			else{
				echo "sad :(";
			}
			
			header('Location: ../Login.php');
			exit();
		?>
	</body>
</html>