<!-- TO DO:
	* Searchbar to fill top
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
	<link href="../css/dropdown.css" rel="stylesheet">
	<div class="navbar navbar-inverse">
		<div class="container">
			<nav>
				<div class="navbar-header">
					<a class="navbar-brand" href="WikiEats.php">WikiEats - GitHungry</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="About.php">About Us</a></li>
					<li><div class="dropdown">
							<button class="dropbtn">Browse</button>
							<div class="dropdown-content">
								<a href="DisplayCategory.php?categoryID=1">Breakfast</a>
								<a href="DisplayCategory.php?categoryID=2">Lunch</a>
								<a href="DisplayCategory.php?categoryID=3">Dinner</a>
								<a href="DisplayCategory.php?categoryID=4">Desserts</a>
								<a href="DisplayCategory.php?categoryID=5">Snacks</a>
								<a href="DisplayCategory.php?categoryID=6">Soups</a>
								<a href="DisplayCategory.php?categoryID=7">Breads</a>
							</div>
						</div>
					</li>
					<li><p>l</p></li>
					<?php // Changes based on if user's logged in
					if($loggedIn)
						echo '
					<li><div class="dropdown">
							<button class="dropbtn">Create</button>
							<div class="dropdown-content">
								<a href="AddRecipe.php">Recipe</a>
								<a href="CreateGroup.php">Group</a>
							</div>
						</div>
					</li>
					<li><a href="DisplayAccount.php?userID='.$_SESSION["userID"].'">Account</a></li>
					<li><a href="Logout.php">Logout</a></li>';
					else
						echo '
					<li><a href="CreateAccount.php">Create Account</a></li>
					<li><a href="Login.php">Login</a></li>
						';
					?>
				</ul>
				<div class="nav navbar-right">
					<form class="navbar-form" role="search" method="GET" action="SearchRecipe.php">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search Recipes, Descriptions, Users" name="search">
							<div class="input-group-btn">
								<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</form>
				</div>
			</nav>
		</div>
	</div>
</header>