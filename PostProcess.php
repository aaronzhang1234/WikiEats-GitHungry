<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body>
		<?php
			$x=1;
			
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
			
			
						
		?>
	</body>
</html>