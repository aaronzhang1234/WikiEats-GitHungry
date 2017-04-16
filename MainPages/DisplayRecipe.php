<?php include '../includes/AccessDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Showing Recipe</title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >
		<script src="../javascripts/displayReviewForm.js"></script>
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
		<?php
			if(isset($_SESSION["userID"]))
			{
				$leadsGroups = RecipeDB::leadsGroups($_SESSION["userID"]);
			}
			
			$recipeInfo = RecipeDB::getGeneralRecipe($_GET["recipeID"]);
			if(count($recipeInfo)<1){
				header('Location: 404.php');
				exit();
			}
			$recipeSteps = RecipeDB::getRecipeSteps($_GET["recipeID"]);
			$recipeReviews = RecipeDB::getReviewsForRecipe($_GET["recipeID"]);
			$user = RecipeDB::getUserByID($recipeInfo['userid']);
			$category = RecipeDB::getCategory($recipeInfo['category']);
			$averageReview = RecipeDB::getAverageReviewForRecipe($_GET["recipeID"]);

			$relatedRecipes = RecipeDB::getRelatedRecipes($recipeInfo["userid"], $recipeInfo["category"], $recipeInfo["recipeid"], 5);
			//print_r($relatedRecipes);

			//print_r($averageReview);
			//print_r( $recipeInfo);
			//print_r($category);
			//print_r($user);
			//print_r($recipeReviews);
			
		?>
	
		<!-- Main Body: Displays Recipes -->

		<!-- Title -->
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo $recipeInfo['Title']; ?> <small>(<a href="DisplayCategory.php?categoryID=<?php echo $recipeInfo['category']; ?>"><?php echo $category; ?></a>) Made by <?php if(count($user)>0){ ?><a href="DisplayAccount.php?userID=<?php echo $recipeInfo['userid']; ?>"><?php echo $user['username']; ?></a><?php }else{echo "deleted";} ?></small></h1>	
		 		</div>
		 	</div>
		 <!-- Add to group form -->
		 	<div class="row">
				<div class="col-md-12">
					<?php
						$_SESSION['recipeID']=$_GET["recipeID"];
						if(isset($_SESSION["userID"]))
						{
							if($leadsGroups && !(count($leadsGroups)==1 && RecipeDB::isPinned($leadsGroups[0]["GroupID"],$_GET["recipeID"])))
							{
								// Gets where user pinned the recipe already
								$unpinnedGroups = Array();
								foreach($leadsGroups as $group)
								{
									$isPinned = RecipeDB::isPinned($group["GroupID"],$_GET["recipeID"]);
									if(!$isPinned)
										array_push($unpinnedGroups, $group);
								}

								if(count($unpinnedGroups) > 0)
								{
									echo '<form class="form-inline col-md-12" method="POST" action="../processes/pinRecipe.php">
										<select name="pin" id="pin">';
									foreach($unpinnedGroups as $group){
										echo '<option value='.$group["GroupID"].'>'.$group["GroupName"].'</opinion>';
									}
									echo '  </select>
										<button class="btn btn-success btn-xs" type="submit"><span class="glyphicon glyphicon-pushpin"></span> Pin recipe to group</button>
									</form>';
								}
							}
						}
					?>

		 		</div>
		 	</div>
		 	<div class="row">
		 		<div class="col-md-6">
					<img src="../images/<?php echo $recipeInfo['imagename']; ?>" alt="tacos" class="img-responsive" /> 
		 		</div>
		 		<div class="col-md-6">
					<p><?php echo $recipeInfo['description']; ?></p>
		 		</div>
		 	</div>
			<?php 
				$x=-1;
				
				while($x<count($recipeSteps)-1){
					$x++;
					echo "<div class='row'>";
					echo	"<div class='col-md-12 col-md-offset-1'>";
					echo		"<h2>Step ".$recipeSteps[$x]['stepnumber'] ."</h2>";
					echo	"</div>";
					echo	"<div class='col-md-3 col-md-offset-1'>";
					echo		"<img src='../images/".$recipeSteps[$x]['imagename']."' alt='tacos' class='img-responsive' />"; 
					echo	"</div>";
					echo	"<div class='col-md-5'>";
					echo		"<p>".$recipeSteps[$x]['stepdescription']."</p>";
					echo	"</div>";
					echo "</div>";
				}
			?>

		 	<!-- Displays Related Recipes & Reviews -->
			<div class="row">
				<!-- Displays Recipes Submitted By User -->
				<div class="panel-group panel-info col-md-6">
					<h1 class="panel-heading">Related Recipes <small>(<?php echo count($relatedRecipes) ?>)</small></h1>
					
					<div class="panel-body">
					<?php
						foreach($relatedRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>
					</div>
				</div>

			 	<!--Displays Reviews-->
				<div class="panel-group panel-success col-md-6">
					<h1 class="panel-heading">Reviews <small> (<?php echo count($recipeReviews); ?>) <?php echo round($averageReview,1) ?>/5</small></h1>
					<div class="panel-body">
						<?php
								$x=-1;
								
								while($x<count($recipeReviews)-1){
									$x++;
									$userReview = RecipeDB::getUserByID($recipeReviews[$x]['userid']);
										echo	"<div class='col-md-12 panel'>";
										echo		"<h2 class='col-md-2'>" .$recipeReviews[$x]['rating']. "/5</h2>";
										echo		"<div class='col-md-10'>";
										echo			"<h3>" .$recipeReviews[$x]['title']. "</h3>";
										echo			"<h4>By ";
										if(count($userReview)>0){
											echo 		"<a href='DisplayAccount.php?userID=".$recipeReviews[$x]["userid"]."'>".$userReview['username']."</a>";
										}else{
											echo 		"Deleted";
										}
										echo		"</h4>";
										echo		"</div>";
										echo		"<p>".$recipeReviews[$x]['reviewTest']."</p>";
										if(isset($_SESSION['userID'])){
											if($recipeReviews[$x]['userid']==$_SESSION['userID']){
												echo '<form class="form-inline" method="POST" action="../processes/DeleteReview.php">
														<input type="hidden" name="review" value='.$recipeReviews[$x]["reviewID"].'>
														<button class="btn-warning btn-sm" type="submit">Delete Review</button>
													</form>';
											}
										}
										echo	"</div>";
										echo	"<hr>";
								}
							?>
					</div>
					
					<div class="panel-body">
						
						<?php
						$_SESSION['recipeID']=$_GET["recipeID"];
						include '../includes/ratingsystem.php'; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>