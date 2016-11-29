<?php
// Review needs: title, description
// Add something for displaying links to categories
// Display related image for each recipe

// Defines classes for accessing the database
class RecipeDB
{
	// Returns user ID from username
	public static function getUserID($username)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT userid FROM users WHERE username LIKE '".$username."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$row = $result->fetch_assoc();
			return $row["userid"];
		}
		else 
			return NULL;
	}

	// Returns user info from userID
	public static function getUserByID($userID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT username, userid, firstname, lastname FROM users WHERE userid LIKE '".$userID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$row = $result->fetch_assoc();
			return $row;
		}
		else 
			return NULL;
	}

	// Gets recipes from userID
	public static function getRecipesByUser($userID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM generalRecipes WHERE userid LIKE '".$userID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$retval = Array(); // What's returned to  user
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}

	// Gets recipes by a category
	public static function getRecipesByCategory($categoryID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM generalRecipes WHERE category LIKE '".$categoryID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$retval = Array(); // What's returned to  user
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}

	// Gets general recipe by recipeID
	public static function getGeneralRecipe($recipeID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM generalRecipes WHERE recipeid LIKE '".$recipeID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$row = $result->fetch_assoc();
			return $row;
		}
		else 
			return NULL;
	}

	// Gets recipe steps for recipeID
	public static function getRecipeSteps($recipeID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM recipesteps WHERE recipeid LIKE '".$recipeID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$retval = Array();
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}

	// Gets reviews given by a user
	public static function getReviewsByUser($userID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM reviews WHERE userid LIKE '".$userID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$retval = Array(); // What's returned to  user
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}

	// Gets reviews given for a recipe
	public static function getReviewsForRecipe($recipeID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM reviews WHERE recipeid LIKE '".$recipeID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$retval = Array(); // What's returned to  user
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}

	// Returns average review for a recipe
		// Returns 5 if there are no reviews
	public static function getAverageReviewForRecipe($recipeID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM reviews WHERE recipeid LIKE '".$recipeID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$count = 0;
			$total = 0;
			while($row = $result->fetch_assoc())
			{
				$total += $row["rating"];
				$count++;
			}
			return ($count != 0)? ($total / $count) : 5;
		}
		else 
			return NULL;
	}

	// Returns review info for recipe
	public static function getRecipeReviewInfo($recipeID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM reviews WHERE recipeid LIKE '".$recipeID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$count = 0;
			$total = 0;
			while($row = $result->fetch_assoc())
			{
				$total += $row["rating"];
				$count++;
			}
			$average = ($count != 0)? ($total / $count) : NULL;
			return Array("total"=>$total, "count"=>$count, "average"=>$average);
		}
		else 
			return NULL;
	}


	// Searches for users based on username
	public static function searchUsers($search)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM users WHERE username LIKE '%".$search."%'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$users = Array();
			while($row = $result->fetch_assoc())
				$users[] = $row;
			return $users;
		}
		else 
			return NULL;
	}

	// Searches for recipes based on title and description
	public static function searchRecipes($search)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT DISTINCT * FROM generalRecipes WHERE Title LIKE '%".$search."%' OR description LIKE'%".$search."%'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$users = Array();
			while($row = $result->fetch_assoc())
				$users[] = $row;
			return $users;
		}
		else 
			return NULL;
	}

	// Gets category name from category ID
	public static function getCategory($categoryID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM recipiecategory WHERE categoryID LIKE '".$categoryID."'";

		// Performs queries
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$row = $result->fetch_assoc();
			return $row["categoryName"];
		}
		else 
			return NULL;
	}

	// Gets top rated recipes
	public static function getTopRatedRecipes($amount)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM generalRecipes";

		// Performs query to get recipes
		$recipes = Array();
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			while($row = $result->fetch_assoc())
			{
				$recipe = Array(RecipeDB::getRecipeReviewInfo($row["recipeid"]), $row);
				if($recipe[0]["average"] != NULL)
					$recipes[] = $recipe;
			}
		}
		else 
			return NULL;

		// Sorts Recipes by average rating value then rating cout
		usort($recipes, function($b, $a)
		{
			if($a[0]["average"] < $b[0]["average"])
				return -1;
			else if($a[0]["average"] > $b[0]["average"])
				return 1;
			else
				return $a[0]["count"] - $b[0]["count"];
			//return $a[0]["average"] - $b[0]["average"];
		});

		// Returns top rated recipes
		$retval = Array();
		for($i = 0; $i < $amount; $i++)
			$retval[] = $recipes[$i][1];
		return $retval;
	}

	// Gets category name from category ID
	public static function getNewestRecipes($amount)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM generalRecipes ORDER BY recipeid DESC";

		// Performs query and returns newest submitted recipes
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			$i = 0;
			$retval = Array();
			while(++$i <= $amount && $row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
		else 
			return NULL;
	}
}// End Class RecipeDB

// Defines functions for displaying quick user info
class DisplayDB
{
	// Displays Recipe
	public static function printRecipe($recipe)
	{
		$averageReview = RecipeDB::getAverageReviewForRecipe($recipe["recipeid"]);
		$category = RecipeDB::getCategory($recipe["category"]);
		$username = RecipeDB::getUserByID($recipe["userid"])["username"];
		$imageFileName = ($recipe["imagename"] != "")? $recipe["imagename"]: "chef_hat.png";

		echo '
						<div class="col-md-12 panel">
							<div class="col-md-12">							
								<h2><a href="DisplayRecipe.php?recipeID='.$recipe["recipeid"].'">'.$recipe["Title"].'</a> <small>(<a href=#>'.$category.'</a>) by <a href="DisplayAccount.php?userID='.$recipe["userid"].'">'.$username.'</a></small></h2>
							</div>
							<div class="col-md-4">
								<img src="images/'.$imageFileName.'" alt="'.$imageFileName.'" class="img-thumbnail" /> 
							</div>
							<div class="col-md-8">
								<h4>'.$averageReview.'/5</h4>
								<p>'.$recipe["description"].'</p>
							</div>
						</div>
						<hr>';
	}

	// Prints user info
	public static function printUser($user)
	{
		$recipeCount = count(RecipeDB::getRecipesByUser($user["userid"]));
		$reviewCount = count(RecipeDB::getReviewsByUser($user["userid"]));
		echo '
					<div class="col-md-12 panel">
						<h2 class="col-md-12"><a href="DisplayAccount.php?userID='.$user["userid"].'">'.$user["username"].'</a></h2>
						<div class="col-md-6">
							'.$recipeCount.' Submitted Recipes
						</div>
						<div class="col-md-6">
							'.$reviewCount.' Reviews
						</div>
					</div>
					<hr/>';
	}
}