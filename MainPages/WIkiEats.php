<?php
$username="root";$password="";$database="recipes";
$mysqli= new mysqli("localhost",$username,$password);
$mysqli-> select_db($database);
?>
<?php include '../includes/AccessDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
		<!-- Header -->
		<?php include '../includes/wikieatsheader.php';?>
		<?php

			// Gets category to display based on the time
			function getDisplayCategory()
			{// Categories: bfast, lunch, dinner, dessert, snack, soup, bread
				date_default_timezone_set("EST"); // Sets to Eastern Time

				// Gets category based on time of day
				$hour = getdate()["hours"];
				if($hour < 6)
					 return Array(5, "Snack");
				else if ($hour < 10)
					return Array(1, "Breakfast");
				else if ($hour < 12)
					return Array(7, "Bread");
				else if ($hour < 15)
					return Array(2, "Lunch");
				else if ($hour < 18)
					return Array(6, "Soup");
				else if ($hour < 20)
					return Array(3, "Dinner");
				else
					return Array(5, "Snack");
			}

			function printCarouselRecipe($recipe, $class = "")
			{
				echo '
			      <div class="item'.$class.'">
			        <img src="../images/'.$recipe["imagename"].'" alt="'.$recipe["Title"].'" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>'.$recipe["Title"].'</h3>
			          <p>'.$recipe["description"].'</p>
			        </div>
			      </div>';
			}
			/*function getDisplayRecipe()
			{
				$retval = Array();

				$retval[] = $newRecipes[0];

				if(isset($categoryRecipes[]))
				{
					$retval[] = $newRecipes[0];
				if(isset($categoryRecipes[]))

				}


			}*/

			// Gets newest recipes to display
			$newRecipes = RecipeDB::getNewestRecipes(5);
			//print_r($newRecipes);

			// Gets top rated recipes to display
			$topRecipes = RecipeDB::getTopRatedRecipes(3);

			// Gets category recipes to display
			$displayCategory = getDisplayCategory();
			$categoryRecipes = RecipeDB::getRecipesByCategory($displayCategory[0]);
		?>
		<!-- Main Body -->
		<div class="container">
			<div class="row">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
			    <ol class="carousel-indicators">
			      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#myCarousel" data-slide-to="1"></li>
			      <li data-target="#myCarousel" data-slide-to="2"></li>
			      <li data-target="#myCarousel" data-slide-to="3"></li>
			    </ol>

				<div class="carousel-inner" role="listbox">
			      <?php 
			      	printCarouselRecipe($newRecipes[0], " active");
			      	printCarouselRecipe($categoryRecipes[0]);
			      	printCarouselRecipe($categoryRecipes[1]); 
			      	printCarouselRecipe($topRecipes[1]); 
			      	?>
				</div>

			    <!-- Left and right controls -->
			    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			      <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			      <span class="sr-only">Next</span>
			    </a>
			</div>

			<div class="col-md-6">
			<!-- Popular Groups -->
            <div class ="panel-group panel-success col-md-12">
				<h1 class ="col-md-12 panel-heading">Popular Groups 
					<?php 
						if($loggedIn)
							echo '<a href="CreateGroup.php"><button class="btn-success btn-sm">Create Group</button></a>';
					?>		
				</h1>
				<div class="panel-body">
					<?php 
						$topGroups = RecipeDB::getTopGroups(5);
			    		foreach($topGroups as $group)
							DisplayDB::printGroups(RecipeDB::getGroup($group['GroupID']));
					?>
                </div>
            </div>

			<!-- Displays Top Users By Recipe Count-->
            <div class ="panel-group panel-success col-md-12">
				<h1 class ="col-md-12 panel-heading">Most Active Users</h1>
				<div class="panel-body">
					<?php 
						$activeUsers = RecipeDB::getTopPeopleByRecipes();
						foreach($activeUsers as $user)
								DisplayDB::printUser(RecipeDB::getUserByID($user["userid"]));
					?>
                </div>
            </div>

			<!-- Displays Top Users By Review Count-->
            <div class ="panel-group panel-success col-md-12">
				<h1 class ="col-md-12 panel-heading">Most Active Critics</h1>
				<div class="panel-body">
					<?php 
						$critics = RecipeDB::getTopPeopleByReviews();
						foreach($critics as $user)
								DisplayDB::printUser(RecipeDB::getUserByID($user["userid"]));
					?>
                </div>
            </div>
            </div>

		 	<!--Displays Newest Recipes -->
			<div class="panel-group panel-danger col-md-6">
				<h1 class="panel-heading">Newest Recipes <small>(<?php echo count($newRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($newRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

		 	<!--Displays Top Rated Recipes -->
			<div class="panel-group panel-warning col-md-6">
				<h1 class="panel-heading">Top Recipes <small>(<?php echo count($topRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($topRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

		 	<!--Displays Recipes In The Given Category -->
			<div class="panel-group panel-success col-md-6">
				<h1 class="panel-heading"><?php echo $displayCategory[1]; ?> <small>(<?php echo count($categoryRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($categoryRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

	   <!--<div id="copyrightRow">
	      <div class="container">
	         <div class="row">
	           <p class="text-muted">All images are copyright to their owners. WikiEats-GitHungry is a property of Aaron Zhang and Apolinar Ortega.
	           <span class="pull-right">&copy; 2016-2017 Copyright</span></p>
	         </div>
	      </div>
	   </div>-->

	</body>
</html>