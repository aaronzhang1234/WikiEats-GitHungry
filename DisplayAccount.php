<?php
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
					 <h1>Account Summary For: <?php echo $_SESSION["username"]." ".$_SESSION["userID"]; ?></h1>
					 <h3>&nbsp;Hello, fName lName</h3>
					 <p>
					 	<a href=#>Change Password</a>
					 </p>
		 		</div>
		 		<div class="col-md-6">
		 			<h2>Recipes</h2>
		 			<div>
		 				Recipe1
		 			</div>
		 			<div>
		 				Recipe2
		 			</div>
		 		</div>
		 		<div class="col-md-6">
		 			<h2>Reviews</h2>
		 			<div>
		 				Review1
		 			</div>
		 			<div>
		 				Review2
		 			</div>
		 		</div>
		 	</div>
		 </div>

	</body>
</html>