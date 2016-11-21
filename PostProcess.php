<?php

$username="root";$password="";$database="recipes";
$mysqli= mysql_connect('localhost',$username,$password);

mysql_select_db($database,$mysqli);


?>
<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body>
		<?php
			$x=1;
			
			
			$title = $_POST["recipiename"];
			$description = $_POST["description"];
			
			echo $_POST["recipiename"];
			echo "</br>";
			echo $_POST["description"];
			
			$etc = "step".$x;
			echo "</br>";
			echo $_POST[$etc];
			
			
			while($x>0){
				$x++;
				$etc = "step".$x;
				
				
				if(!(isset($_POST[$etc]))){
					break;
				}
				else{
					echo $_POST[$etc];
					echo "</br>";
				}
			}	
			
			$sqlget= "SELECT COUNT(*)FROM generalrecipes";
			
			$result=mysql_query($sqlget);
			echo mysql_result($result,0);
			
			$sql = "INSERT INTO generalrecipes(description,Title) 
			VALUES ('".$_POST['description']."','".$_POST['recipiename']."')";
			
			
			
			
			if(mysql_query($sql)){
				echo "added!";
			}
			else{
				echo "sad :(";
			}
						
		?>
	</body>
</html>