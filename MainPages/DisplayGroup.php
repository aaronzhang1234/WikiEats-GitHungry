<?php include '../includes/AccessDatabase.php'; ?>
<?php
	$groupstuff = RecipeDB::getGroup($_GET["groupID"]);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $groupstuff["GroupName"]; ?></title>

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
			<?php
				echo "<h1>".$groupstuff["GroupName"]."</h1>";
				$_SESSION["group"]=$_GET["groupID"];
				if(isset($_SESSION["userID"])){
					$inGroup = RecipeDB::isInGroup($_GET["groupID"],$_SESSION["userID"]);
					if($inGroup){
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/LeaveGroup.php">
									<button class="btn-danger" type="submit">Leave Group</button>
								</form>';
					}
					else{
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/JoinGroup.php">
								<button class="btn-success" type="submit">Join Group</button>
								</form>';
					}
				}
			?>
			 	<!--Displays Found Recipes -->
				<div class="panel-group panel-success col-md-12">					
					<div class="panel-body">
					<?php
						$recipes = RecipeDB::getRecipesByGroups($_GET["groupID"]);
						$pinnedrecipes = RecipeDB::getPinnedRecipes($_GET["groupID"]);
					?>
						<h2>Newest Group Recipes</h2>
						<?php  
							// Prints each recipe found
							
							foreach($recipes as $recipe){
								$fullrecipe = RecipeDB::getGeneralRecipe($recipe["recipeid"]);
								DisplayDB::printRecipe($fullrecipe);
							}
						?>
					
						<?php
							$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);
							if(count($pinnedrecipes)!=0){
								echo "<h1>Pinned Recipes</h1>";
								foreach($pinnedrecipes as $recipe){
									$fullrecipe = RecipeDB::getGeneralRecipe($recipe["RecipeID"]);
									if($isLeader){
										echo '<form class=="form-horizontal col-md-12" method="POST" action="../processes/RemovePinned.php">
											<input type="hidden" name="recipe" value='.$recipe["RecipeID"].'>
											<button class="btn-danger" type="submit"><span class="glyphicon glyphicon-minus"></span> Unpin</button>
											</form>';
									}
				
									DisplayDB::printRecipe($fullrecipe);
								}
							}
						?>
						
					</div>
				</div>
			</div>
		 </div>
	</body>
</html>