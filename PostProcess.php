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
			echo $etc;
			echo "</br>";
			echo $_POST[$etc];
			
			
			while($x>=0){
				$x++;
				$etc = "step".$x;
				
				if(is_null($_POST[$etc])){
					break;
				}
				else{
					echo $_POST[$etc];
				}
			}	
			echo "hello";
			
						
		?>
	</body>
</html>