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
			
			
			
			
			$titleimagename=$_FILES['mainpic']['name'];
			echo "</br>";
			$imagemain_temp=$_FILES['mainpic']['tmp_name'];
			if(move_uploaded_file($imagemain_temp,"../images/".$titleimagename)){
				echo "yay";
			}
			else{
				echo "nay";
			}
			echo "<br>";	





			
//			put the general recipe stuff in the generaldatabase	
			$sql = "INSERT INTO generalrecipes(userid,description,category,Title,imagename) 
			VALUES ('".$_SESSION['userID']."','".$_POST['description']."','".$_POST['FoodCategory']."','".$_POST['recipiename']."','$titleimagename')";
		  
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
				$image = "image".$x;
				
				
				if(!(isset($_POST[$etc]))){
					//if there is no step, break from the loop
					break;
				}
				else{
					$image_name=$_FILES[$image]['name'];
					//for each step insert in a different row
					$sqlsteps = "INSERT INTO recipesteps(recipeID,stepnumber,stepdescription,imagename)
					VALUES ('$number','$x','".$_POST[$etc]."','$image_name')";
					
					if(mysql_query($sqlsteps)){
						echo "added";
					}
					else{
						echo "sad!";
					}
					
					
					echo $_POST[$etc];
					echo "</br>";
					
					
					echo $image_name=$_FILES[$image]['name'];
					echo "</br>";
					echo $image_temp=$_FILES[$image]['tmp_name'];
						if(move_uploaded_file($image_temp,"../images/".$image_name)){
							echo "yay";
						}
						else{
							echo "nay";
						}
					echo "</br>";
		
				}
			}	
		?>
		<?php
			header('Location: ../MainPages/WikiEats.php');
			exit();
		?>
	
	</body>
</html>