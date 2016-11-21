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
			$x=0;
			
			
			$title = $_POST["recipiename"];
			$description = $_POST["description"];
			
			echo $_POST["recipiename"];
			echo "</br>";
			echo $_POST["description"];
			
//			put the general recipe stuff in			
			$sql = "INSERT INTO generalrecipes(description,Title) 
			VALUES ('".$_POST['description']."','".$_POST['recipiename']."')";
			
			if(mysql_query($sql)){
				echo "added!";
			}
			else{
				echo "sad :(";
			}
			
//			starting to put the steps in the database
			$sqllast ="SELECT recipeid FROM generalrecipes ORDER BY recipeid DESC LIMIT 1";
			
			$result = mysql_query($sqllast);			
			$number = mysql_result($result,0);
			echo $number;
			
			
			
			
			while($x>-1){
				$x++;
				$etc = "step".$x;
				
				
				if(!(isset($_POST[$etc]))){
					break;
				}
				else{
					
					$sqlsteps = "INSERT INTO recipesteps(recipeID,stepnumber,stepdescription)
					VALUES ('$number','$x','".$_POST[$etc]."')";
					
					if(mysql_query($sqlsteps)){
						echo "added";
					}
					else{
						echo "sad!";
					}
					echo $_POST[$etc];
					echo "</br>";
				}
			}	
			
			
		

						
		?>
	</body>
</html>