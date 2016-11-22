<?php

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
		?>
	</body>
</html>