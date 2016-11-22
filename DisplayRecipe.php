<?php
	// To Display Reviews as well
	// Display related Reviews & parent review
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >

		<!--<link href="chapter12-project02.css" rel="stylesheet">-->
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
	
		<!-- Main Body: Displays Recipes -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Tacos <small>(Lunch) Made by <a href=#>username</a></small></h1>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<div class="col-md-6">
					<img src="images/tacos.jpeg" alt="tacos" class="img-responsive" /> 
		 		</div>
		 		<div class="col-md-6">
					<p>Delicious Beef Tacos. This was a recipe given to me by my grandmother</p>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<div class="col-md-12 col-md-offset-1">
		 			<h2>Step 1</h2>
		 		</div>
		 		<div class="col-md-3 col-md-offset-1">
					<img src="images/tacos.jpeg" alt="tacos" class="img-responsive" /> 
		 		</div>
		 		<div class="col-md-5">
					<p>Get Tortillas, chop onions, chop cilantro, and chop limes. Once those are chopped, put them each in their own seperate containers.</p>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<div class="col-md-12 col-md-offset-1">
		 			<h2>Step 2</h2>
		 		</div>
		 		<div class="col-md-3 col-md-offset-1">
					<img src="images/tacos.jpeg" alt="tacos" class="img-responsive" /> 
		 		</div>
		 		<div class="col-md-5">
					<p>Get Tortillas, chop onions, chop cilantro, and chop limes. Once those are chopped, put them each in their own seperate containers.</p>
		 		</div>
		 	</div>
		 	<hr />
		 </div>

		 <!--Displays Reviews-->
		 <!--Reviewer, Recipe, rating, description -->
		<div class="container">
			<div class="panel-group panel-info col-md-6">
				<h1 class="panel-heading">Related Recipes</h1>
				<div class="panel-body">
					<div class="col-md-12 panel">
						<div class="col-md-12">							
							<h2><a href=#>Super Tacos</a> <small>by <a href=#>username2</a></small></h2>
						</div>
						<div class="col-md-4">
							<img src="images/tacos.jpeg" alt="tacos" class="img-thumbnail" /> 
						</div>
						<div class="col-md-8">
							<h4>3.2/5</h4>
							<p>Tacos with superpowers</p>
						</div>
					</div>
					<hr>
				</div>
			</div>

			<div class="panel-group panel-success col-md-6">
				<h1 class="panel-heading">Reviews <small>3.5/5</small></h1>
				<div class="panel-body">
					<div class="col-md-12 panel">
						<h2 class="col-md-2">2/5</h2>
						<div class="col-md-10">
							<h3>Gave Me Gas</h3>
							<h4>By <a href=#>username</a></h4>
						</div>
						<p>It made my ass into a fiery volcano. They were delicious though.</p>
					</div>
					<hr>

					<div class="col-md-12">
						<h2 class="col-md-2">5/5</h2>
						<div class="col-md-10">
							<h3>Amazing Cannot Go Back To Normal Life Again!</h3>
							<h4>By <a href=#>username1</a></h4>
						</div>
						<p>This is life!!!</p>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>