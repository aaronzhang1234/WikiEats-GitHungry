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
				echo "<div class='col-md-2'><img class='img-circle' src='../images/grouppics/".$grouppic."' alt='".$grouppic."' HEIGHT=100 WIDTH=100 /img></div>";
				echo "<h1 class='col-md-10'>".$groupstuff["GroupName"]."<br/>&nbsp;&nbsp;&nbsp;";
				echo "<small>".$groupstuff["GroupDescription"]."</small></h1>";
				$_SESSION["group"]=$_GET["groupID"];
				if(isset($_SESSION["userID"])){
					$inGroup = RecipeDB::isInGroup($_GET["groupID"],$_SESSION["userID"]);
					$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);			
					if($isLeader){
						include '../includes/ManageGroup.php';
					}else if($inGroup){
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/LeaveGroup.php">
									<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-minus"></span> Leave</button>
								</form>';
					}else{
						echo '<form class="form-horizontal col-md-12" method="POST" action="../processes/JoinGroup.php">
								<button class="btn btn-success btn-xs" type="submit"><span class="glyphicon glyphicon-plus"></span> Join</button>
								</form>';
					}
				}else{
					$isLeader=FALSE;
				}
			
			// Gets recipes to display
			$recipes = RecipeDB::getRecipesByGroups($_GET["groupID"]);
			$pinnedrecipes = RecipeDB::getPinnedRecipes($_GET["groupID"]);
			$members = RecipeDB::getGroupMembers($_GET["groupID"]);

			// Determines if user is group leader
			if(isset($_SESSION["userID"]))
				$isLeader = RecipeDB::isGroupLeader($_SESSION["userID"],$_GET["groupID"]);
			else
				$isLeader=0;
			?>
				<div class='col-md-5'>
				<!-- Display Group Members -->
				<div class="panel-group panel-info col-md-12">
					<h2 class ="col-md-12 panel-heading">Members (<?php echo count($members); ?>)</h2>
					<div class="panel-body">
						<?php 
							foreach($members as $user)
								DisplayDB::printUser(RecipeDB::getUserByID($user["UserID"]));
						?>
					</div>
				</div>
				</div>

				<div class='col-md-7'>
				<!--Displays Pinned Recipes -->
				<div class="panel-group panel-info col-md-12">
					<h2 class ="col-md-12 panel-heading">Pinned Recipes (<?php echo count($pinnedrecipes); ?>)</h2>

						<div class="panel-body">
						<?php  // Prints each recipe found
							if(count($pinnedrecipes) > 0)
							foreach($pinnedrecipes as $recipe)
							{
								$fullrecipe = RecipeDB::getGeneralRecipe($recipe["RecipeID"]);
								if($isLeader){
									echo '<form class="form-inline col-md-12" method="POST" action="../processes/RemovePinned.php">
											<input type="hidden" name="recipe" value='.$recipe["RecipeID"].'>
											<button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-pushpin"></span> Unpin</button>
											</form>';
								}
								DisplayDB::printRecipe($fullrecipe);
							}
						?>
					</div>
				</div>

				<!-- Displays Newest Recipes -->
				<div class="panel-group panel-success col-md-12">
					<h2 class ="col-md-12 panel-heading">Newest Recipes (<?php echo count($recipes); ?>)</h2>

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
		</div>
	</body>
</html>