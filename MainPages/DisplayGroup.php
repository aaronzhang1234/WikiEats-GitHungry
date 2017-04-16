<?php include '../includes/AccessDatabase.php'; ?>
<?php
	$groupstuff = RecipeDB::getGroup($_GET["groupID"]);
	if(count($groupstuff)<1){
		header('Location: 404.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $groupstuff["GroupName"]; ?></title>
		<script src="../javascripts/displayManage.js"></script> 
		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<script src="../javascripts/rusure.js"></script>
		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
	
		<!-- Main Body -->
		<div class="container">
			
			<div class="row">
			<?php
				$grouppic = ($groupstuff['GroupPicture']!="")? $groupstuff['GroupPicture']:"chef_hat.png";
				echo "<img src='../images/grouppics/".$grouppic."' alt='".$grouppic."' HEIGHT=100 WIDTH=100 /img>";
				echo "<h1>".$groupstuff["GroupName"]."</h1>";
				echo "<h3><small>Group Description: ".$groupstuff["GroupDescription"]."</small></h3>";
				$_SESSION["group"]=$_GET["groupID"];
				if(isset($_SESSION["userID"])){
					$inGroup = RecipeDB::isInGroup($_GET["groupID"],$_SESSION["userID"]);
					$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);			
					if($isLeader){
						include '../includes/ManageGroup.php';
					}else if($inGroup){
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/LeaveGroup.php">
									<button class="btn-danger" type="submit">Leave Group</button>
								</form>';
					}else{
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/JoinGroup.php">
								<button class="btn-success" type="submit">Join Group</button>
								</form>';
					}
				}else{
					$isLeader=FALSE;
				}
			
			// Gets recipes to display
			$recipes = RecipeDB::getRecipesByGroups($_GET["groupID"]);
			$pinnedrecipes = RecipeDB::getPinnedRecipes($_GET["groupID"]);

			// Determines if user is group leader
			if(isset($_SESSION["userID"]))
				$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);
			else
				$isLeader=0;
			?>

				<!--Displays Found Recipes -->
				<div class="panel-group panel-success col-md-12">
					<div class="panel-body">
						<h2>Pinned Recipes (<?php echo count($pinnedrecipes); ?>)</h2>

						<div class="panel-body">
						<?php  // Prints each recipe found
							if(count($pinnedrecipes) > 0)
							foreach($pinnedrecipes as $recipe)
							{
								$fullrecipe = RecipeDB::getGeneralRecipe($recipe["RecipeID"]);
								if($isLeader){
									echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/RemovePinned.php">
											<input type="hidden" name="recipe" value='.$recipe["RecipeID"].'>
											<button class="btn-danger" type="submit"><span class="glyphicon glyphicon-minus"></span> Unpin</button>
											</form>';
								}
								DisplayDB::printRecipe($fullrecipe);
							}

							/*if(count($pinnedrecipes)!=0){
								echo "<h1>Pinned Recipes</h1>";
								if(isset($_SESSION["userID"])){
										$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);
								}else{
									$isLeader=0;
								}	
								foreach($pinnedrecipes as $recipe){
									$fullrecipe = RecipeDB::getGeneralRecipe($recipe["RecipeID"]);
									if($isLeader){
										echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/RemovePinned.php">
							*/
						?>
						</div>
					</div>
				</div>

				<div class="panel-group panel-success col-md-12">
					<h2>Newest Recipes (<?php echo count($recipes); ?>)</h2>

					<div class="panel-body">
						<?php 
							foreach($recipes as $recipe)
							{
								$fullrecipe = RecipeDB::getGeneralRecipe($recipe["recipeid"]);
								DisplayDB::printRecipe($fullrecipe);
							}
						?>
					</div>
				</div>

			</div>
		</div>
	</body>
</html>