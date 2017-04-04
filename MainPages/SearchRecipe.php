<?php include 'includes/AccessDatabase.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Search: "<?php echo $_GET["search"]; ?>"</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
		<?php
			$users = RecipeDB::searchUsers($_GET["search"]);
			$recipes = RecipeDB::searchRecipes($_GET["search"]);
		?>
	
		<!-- Main Body -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Search Results for "<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>"</h1>
					<p>
		 		</div>
		 	</div>

		 	<!--Displays Found Recipes -->
			<div class="panel-group panel-info col-md-6">
				<h1 class="panel-heading">Recipes <small>(<?php echo count($recipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						// Prints each recipe found
						foreach($recipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>
					
				</div>
			</div>

		 	<!--Displays Found Users -->
			<div class="panel-group panel-success col-md-6">
				<h1 class="panel-heading">Users <small>(<?php echo count($users); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						// Prints each user found
						foreach($users as $user)
							DisplayDB::printUser($user);
					?>

				</div>
			</div>
		 </div>

	</body>
</html>