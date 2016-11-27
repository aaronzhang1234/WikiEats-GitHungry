<!-- TO DO
	* Display image for each user-submitted recipe
	* Show Parent recipe for each recipe
	-->
<?php include 'includes/AccessDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
		<?php 
			// Gets User Info
			$user = RecipeDB::getUserByID($_GET["userID"]); // User Info
			$recipes = RecipeDB::getRecipesByUser($user["userid"]);
			$reviews = RecipeDB::getReviewsByUser($user["userid"]);
			//print_r ($reviews);

			function printRecipe($recipe)
			{
				$averageReview = RecipeDB::getAverageReviewForRecipe($recipe["recipeid"]); 
				echo '
						<div class="col-md-12 panel">
							<div class="col-md-12">							
								<h2><a href="DisplayRecipe.php?recipeID='.$recipe["recipeid"].'">'.$recipe["Title"].'</a></h2>
							</div>
							<div class="col-md-4">
								<img src="images/tacos.jpeg" alt="tacos" class="img-thumbnail" /> 
							</div>
							<div class="col-md-8">
								<h4>'.$averageReview.'/5</h4>
								<p>'.$recipe["description"].'</p>
							</div>
						</div>
						<hr>';
			}

			function printReview($review)
			{
				$recipe = RecipeDB::getGeneralRecipe($review["recipeid"]);
				$userName = RecipeDB::getUserByID($recipe["userid"])["username"];
				//echo $userName;
				echo '
						<div class="col-md-12 panel">
							<h2 class="col-md-12"><a href="DisplayRecipe.php?recipeID='.$recipe["recipeid"].'">'.$recipe["Title"].'</a><small> by <a href="DisplayAccount.php?userID='.$recipe["userid"].'">'.$userName.'</a></small></h2>
							<h2 class="col-md-2">'.$review["rating"].'/5</h2>
							<p>'.$review["description"].'</p>
						</div>
						<hr>';
			}
		?>
	
		<!-- Main Body -->
		<div class="container">
			<div class="row">
				<!-- Displays Basic Info On User -->
				<div class="col-md-12">
					 <h1>Account Summary For: <?php echo $user["username"]?></h1>
					 <h3><strong>Name:</strong> <?php echo $user["firstname"]." ".$user["lastname"] ?></h3>
		 		</div>


				<!-- Displays Recipes Submitted By User -->
				<div class="panel-group panel-info col-md-6">
					<h1 class="panel-heading">Recipes (<?php echo count($recipes) ?>)</h1>
					
					<div class="panel-body">
					<?php
						foreach($recipes as $recipe)
							printRecipe($recipe);
					?>
					</div>
				</div>


				<!-- Displays Reviews Submitted By User -->
				<div class="panel-group panel-success col-md-6">
					<h1 class="panel-heading">Reviews (<?php echo count($reviews) ?>)</h1>
					<div class="panel-body">
						<?php 
							foreach($reviews as $review)
								printReview($review);
						?>
					</div>
				</div>
		 	</div>
		 </div>

	</body>
</html>