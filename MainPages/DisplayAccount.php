<?php include '../includes/AccessDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Account</title>

		<!-- Bootstrap core CSS -->
		<script src="../javascripts/displayChange.js"></script>
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >
		<link href="../css/login.css" rel="stylesheet">
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
		<?php 
			// Gets User Info
			$user = RecipeDB::getUserByID($_GET["userID"]); // User Info
			if(count($user)<1){
				header('Location: 404.php');
				exit();
			}
			$_SESSION["follow"] =  $_GET["userID"];
			$recipes = RecipeDB::getRecipesByUser($user["userid"]);
			$reviews = RecipeDB::getReviewsByUser($user["userid"]);
			$followers = RecipeDB::getFollowing($user["userid"]);
			$following = RecipeDB::getFollowers($user["userid"]);
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
							<h3>'.$review["title"].'</h3>';
							if($_SESSION["userID"]==$_GET["userID"]){
							 echo '<form class="form-inline" method="POST" action="../processes/DeleteReview.php">
							 	<input type="hidden" name="review" value='.$review["reviewID"].'>
								<button class="btn-warning btn-sm" type="submit">Delete Recipe</button>
							</form>';
							}
						echo '<p>'.$review["reviewTest"].'</p>
						</div>
						<hr>';
			}
		?>
	
		<!-- Main Body -->
		
		<div class="container">
			<div class="row">
				<!-- Displays Basic Info On User -->
				<div class="col-md-12">
					 <h1>Account Summary For: <?php 
					 	echo $user["username"]; // UserName

					 	if(isset($_SESSION["userID"])){
					 		// Display cog if user
					 		if($_SESSION["userID"]===$_GET["userID"])
								include '../includes/ChangeAccount.php';
								if(isset($_SESSION["error"]) && $_SESSION["error"]){
									?>
									<div class="alert">
										<span class="closebtn" onclick ="this.parentElement.style.display='none';">&times;</span>
										Wrong user credentials, please try again.
									<?php
									$_SESSION["error"]=false;
								}
					 		// Display follow/unfollow button if not displayed user
							else if($_SESSION["userID"]!=$_GET["userID"]){
								$isFollowing = RecipeDB::isFollowing($_SESSION["userID"],$_GET["userID"]);
								if($isFollowing){
									echo '<form class="form-inline" method="POST" action="../processes/UnFollow.php">
										<button class="btn-warning btn-sm" type="submit">Unfollow</button>
										</form>';
								}
								else{
									echo '<form class="form-horizontal" method="POST" action="../processes/Follow.php">
										<button class="btn-success">Follow</button>
										</form>';
								}
							}
						 }
					 ?>
					 </h1>
					 <h3><strong>Name:</strong> <?php echo $user["firstname"]." ".$user["lastname"] ?></h3>
					 <h4><strong>Followers</strong><?php echo "(".count($following).")";?><strong>Following</strong><?php echo "(".count($followers).")"; ?></h4> 
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