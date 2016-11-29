<!-- TO DO:
	* DisplayRecipe
		* AddReview Function Beautify
		* Related Recipes to work better
	* Front Page Design
		* Slideshow to have real images <images to fit in carousel>
		* Featured Category icon (ie. sunrise for breakfast)
	* Beautify addRecipe
-->
<!-- Can change navbar be about the user-->
<?php
	session_start();
	if(isset($_SESSION["username"]) && isset($_SESSION["userID"]))
		$loggedIn = true;
	else
		$loggedIn = false;

	//echo ($loggedIn)?$_SESSION["username"].': '.$_SESSION['userID']:"Not Logged In";
?>

<header>
	<div class="navbar navbar-inverse">
		<div class="container">
			<nav>
				<div class="navbar-header">
					<a class="navbar-brand" href="WikiEats.php">WikiEats - GitHungry</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href=#>Contact Us</a></li>
					<li><a href=#>About Us</a></li>
					<?php // Changes based on if user's logged in
					if($loggedIn)
						echo '
					<li><a href="NewestRecipes.php">Newest Recipes</a></li>
					<li><a href="addRecipe.php">Submit Recipe</a></li>
					<li><a href="DisplayAccount.php?userID='.$_SESSION["userID"].'">Account</a></li>
					<li><a href="Logout.php">Logout</a></li>';
					else
						echo '
					<li><a href="CreateAccount.php">Create Account</a></li>
					<li><a href="Login.php">Login</a></li>
						';
					?>
				</ul>
				<ul class="nav navbar-right">
					<li>
						<form class="form-inline" method="GET" action="SearchRecipe.php">
							<div class="form-group">
							<input type="text" class="form-control" placeholder="Search Recipes, Descriptions, Users" name="search">
							</div>
							<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>