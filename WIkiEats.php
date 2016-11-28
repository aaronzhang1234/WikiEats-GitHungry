<?php
$username="root";$password="";$database="recipes";
$mysqli= new mysqli("localhost",$username,$password);
$mysqli-> select_db($database);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

		<!--<link href="chapter12-project02.css" rel="stylesheet">-->
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
	
		<!-- Main Body -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>userid</th>
							<th>steps</th>
						</tr>
					 <?php
					 
						$sqlrecipes = "SELECT * FROM generalrecipes";
									   
						if($result = mysqli_query($mysqli,$sqlrecipes)){
							while($row = mysqli_fetch_assoc($result)){
								$sqlusername = "SELECT username from users WHERE userid = '".$row['userid']."'";
								
								if($userresult = mysqli_query($mysqli,$sqlusername)){
									while($usernamerow = mysqli_fetch_assoc($userresult)){
										echo $usernamerow['username'];
							
										echo "<tr>";
										//echo "<td>".$row['Title']. "</td>";
										echo "<td>".$row['description']."</td>";
										echo "<td>".$usernamerow['username']. "</td>";
										$sqlsteps = "SELECT stepnumber,stepdescription from recipesteps 
													 WHERE recipeID = '".$row['recipeid']."'";
										if($stepresult = mysqli_query($mysqli,$sqlsteps)){
											while($steprow = mysqli_fetch_assoc($stepresult)){
												echo "<td>";
												echo "Step".$steprow['stepnumber'].": ".$steprow['stepdescription'];
												
											}
											
										}
										echo "</td>";
													 
										echo "</tr>";
									}
								}
							}
						}			   
						
					 ?>
					 <table>
					 
					 
		 		</div>
		 	</div>
		 </div>


		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
	   <!--<div id="copyrightRow">
	      <div class="container">
	         <div class="row">
	           <p class="text-muted">All images are copyright to their owners.
	           <span class="pull-right">&copy; 2016 Copyright</span></p>
	         </div>
	      </div>
	   </div>-->

	</body>
</html>