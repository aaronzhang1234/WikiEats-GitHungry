<?php include '../includes/AccessDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Account</title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
		<?php 
			$_SESSION["follow"] =  $_GET["userID"];
			// Gets User Info
			$user = RecipeDB::getUserByID($_GET["userID"]); // User Info
			$recipes = RecipeDB::getRecipesByUser($user["userid"]);
			$reviews = RecipeDB::getReviewsByUser($user["userid"]);

			function printReview($review)
			{
				$recipe = RecipeDB::getGeneralRecipe($review["recipeid"]);
				$userName = RecipeDB::getUserByID($recipe["userid"])["username"];
				$category = RecipeDB::getCategory($recipe["category"]);
				//echo $userName;
				echo '
						<div class="col-md-12 panel">
							<h2 class="col-md-12"><a href="DisplayRecipe.php?recipeID='.$recipe["recipeid"].'">'.$recipe["Title"].'</a> <small>(<a href="DisplayCategory.php?categoryID='.$recipe["category"].'">'.$category.'</a>) by <a href="DisplayAccount.php?userID='.$recipe["userid"].'">'.$userName.'</a></small></h2>
							<h2 class="col-md-2">'.$review["rating"].'/5</h2>
							<h3>'.$review["title"].'</h3>
							<p>'.$review["reviewTest"].'</p>
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
					 <?php
					 	if(isset($_SESSION["userID"])){
							if($_SESSION["userID"]!=$_GET["userID"]){
								$following = RecipeDB::isFollowing($_SESSION["userID"],$_GET["userID"]);
								if($following){
									echo '<form method="POST" action="../processes/UnFollow.php">
												<input  type="submit" value="unfollow this guy">
										</form>';
								}
								else{
									echo '<form method="POST" action="../processes/Follow.php">
												<input  type="submit" value="follow this guy">
										</form>';
								}
							}
						 }
					 ?>
					 <h3><strong>Name:</strong> <?php echo $user["firstname"]." ".$user["lastname"] ?></h3>
		 		</div>


				<!-- Displays Recipes Submitted By User -->
				<div class="panel-group panel-info col-md-6">
					<h1 class="panel-heading">Recipes <small>(<?php echo count($recipes) ?>)</small></h1>
					
					<div class="panel-body">
					<?php
						foreach($recipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>
					</div>
				</div>


				<!-- Displays Reviews Submitted By User -->
				<div class="panel-group panel-success col-md-6">
					<h1 class="panel-heading">Reviews <small>(<?php echo count($reviews) ?>)</small></h1>
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