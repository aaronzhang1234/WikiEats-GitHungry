<?php
$username="root";$password="";$database="recipes";
$mysqli= new mysqli("localhost",$username,$password);
$mysqli-> select_db($database);
?>
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
		<style>
  		.carousel-inner > .item > img,
  		.carousel-inner > .item > a > img {
      		height: 100%;
      		width: 100%;
      		margin: auto;
  		}

		.carousel 
		{
		  height: 50em;
		  overflow: hidden;
		}
  		</style>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
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
					return Array(8, "Bread");
				else if ($hour < 15)
					return Array(2, "Lunch");
				else if ($hour < 18)
					return Array(6, "Soup");
				else if ($hour < 20)
					return Array(3, "Dinner");
				else
					return Array(5, "Snack");
			}

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
			      <div class="item active">
			        <img src="images/chef_hat.png" alt="chefHat" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>Chefs Hat</h3>
			          <p>Something Something</p>
			        </div>
			      </div>
			      <div class="item">
			        <img src="images/giveth.png" alt="giveth" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>Giveth AND Taketh</h3>
			          <p>Karma!</p>
			        </div>
			      </div>
			      <div class="item">
			        <img src="images/tacos.jpeg" alt="tacos" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>Tacos</h3>
			          <p>So Yummy!</p>
			        </div>
			      </div>
			      <div class="item">
			        <img src="images/pokemon drake and josh.jpg" alt="Pokemon DJ" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>Next is Pokemon Black and Blue</h3>
			          <p>Meh</p>
			        </div>
			      </div>
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

		 	<!--Displays Newest Recipes -->
			<div class="panel-group panel-danger col-md-12">
				<h1 class="panel-heading">Newest Recipes <small>(<?php echo count($newRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($newRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

		 	<!--Displays Top Rated Recipes -->
			<div class="panel-group panel-warning col-md-12">
				<h1 class="panel-heading">Top Recipes <small>(<?php echo count($topRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($topRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

		 	<!--Displays Recipes In The Given Category -->
			<div class="panel-group panel-success col-md-12">
				<h1 class="panel-heading"><?php echo $displayCategory[1]; ?> <small>(<?php echo count($categoryRecipes); ?>)</small></h1>
				
				<div class="panel-body">
					<?php  
						foreach($categoryRecipes as $recipe)
							DisplayDB::printRecipe($recipe);
					?>

				</div>
			</div>

				<!--<div class="col-md-12">
					<table>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>userid</th>
							<th>steps</th>
						</tr>
					 <?php
					 /*
						$sqlrecipes = "SELECT * FROM generalrecipes";
									   
						if($result = mysqli_query($mysqli,$sqlrecipes)){
							while($row = mysqli_fetch_assoc($result)){
								$sqlusername = "SELECT username from users WHERE userid = '".$row['userid']."'";
								
								if($userresult = mysqli_query($mysqli,$sqlusername)){
									while($usernamerow = mysqli_fetch_assoc($userresult)){
										echo $usernamerow['username'];
							
										echo "<tr>";
										//echo "<td>".$row['Title']. "</td>";
										echo "<td>".$row['description']."</td>";
										echo "<td>".$usernamerow['username']. "</td>";
										$sqlsteps = "SELECT stepnumber,stepdescription from recipesteps 
													 WHERE recipeID = '".$row['recipeid']."'";
										if($stepresult = mysqli_query($mysqli,$sqlsteps)){
											while($steprow = mysqli_fetch_assoc($stepresult)){
												echo "<td>";
												echo "Step".$steprow['stepnumber'].": ".$steprow['stepdescription'];
												
											}
											
										}
										echo "</td>";
													 
										echo "</tr>";
									}
								}
							}
						}			   
						*/
					 ?>
					 </table>
					 
					 
		 		</div>
		 	</div>
		 </div> -->
		 
	   <!--<div id="copyrightRow">
	      <div class="container">
	         <div class="row">
	           <p class="text-muted">All images are copyright to their owners.
	           <span class="pull-right">&copy; 2016 Copyright</span></p>
	         </div>
	      </div>
	   </div>-->

	</body>
</html>