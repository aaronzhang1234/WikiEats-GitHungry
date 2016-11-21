<?php

$username="root";$password="";$database="recipes";
$mysqli= mysql_connect('localhost',$username,$password);

mysql_select_db($database,$mysqli);

session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body>
		<?php
			$x=0;
			
			echo $_POST["recipiename"];
			echo "</br>";
			echo $_POST["description"];
			
//			put the general recipe stuff in the generaldatabase	
			$sql = "INSERT INTO generalrecipes(userid,description,category,Title) 
			VALUES ('".$_SESSION['userID']."','".$_POST['description']."','".$_POST['FoodCategory']."','".$_POST['recipiename']."')";
		  
		  //actually adding the stuff in	
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
			
			//while loop to loop through all the steps
			while($x>-1){
				$x++;
				$etc = "step".$x;
				
				
				if(!(isset($_POST[$etc]))){
					//if there is no step, break from the loop
					break;
				}
				else{
					//for each step insert in a different row
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