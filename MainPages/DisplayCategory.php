<?php include '../includes/AccessDatabase.php'; ?>
<?php
	$category = RecipeDB::getCategory($_GET["categoryID"]);
	$recipes = RecipeDB::getRecipesByCategory($_GET["categoryID"]);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Category: <?php echo $category; ?></title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
	
		<!-- Main Body -->
		<div class="container">
			<div class="row">
			 	<!--Displays Found Recipes -->
				<div class="panel-group panel-info col-md-12">
					<h1 class="panel-heading"><?php echo $category; ?> <small>(<?php echo count($recipes); ?>)</small></h1>
					
					<div class="panel-body">
						<?php  
							// Prints each recipe found
							foreach($recipes as $recipe)
								DisplayDB::printRecipe($recipe);
						?>
						
					</div>
				</div>
			</div>
		 </div>
	</body>
</html>