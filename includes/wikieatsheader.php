<!-- TO DO:
	* Login Verification & Process
	* Create Account Verification, Process, & Functionality
	* EditUser.php
	* EditRecipe.php
	* EditReview.php

	* DisplayRecipe.php
	* DisplayAccount.php
	* SearchRecipe.php
	* ProcessCreateAccount
-->
<!-- Can change navbar be about the user-->
<?php
	session_start();
	if(isset($_SESSION["username"]) && isset($_SESSION["userID"]))
		$loggedIn = true;
	else
		$loggedIn = false;

	echo ($loggedIn)?$_SESSION["username"]:"Not Logged In";

?>

<header>
	<div class="navbar navbar-inverse">
		<div class="container">
			<nav>
				<div class="navbar-header">
					<a class="navbar-brand" href="WikiEats.php">WikiEats - GitHungry</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="WikiEats.php">Home</a></li>
					<li><a href=#>Contact Us</a></li>
					<li><a href=#>About Us</a></li>
					<?php // Changes based on if user's logged in
					if($loggedIn)
						echo '
					<li><a href="addRecipe.php">Submit Recipe</a></li>
					<li><a href="DisplayAccount.php">Account</a></li>
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
							<input type="text" class="form-control" placeholder="Search Recipes" name="recipe">
							</div>
							<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>