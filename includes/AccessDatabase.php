<?php
// generalRecipes need: Title
// review need: Title

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
				$retval[] = $row;//Array("userid"=>$row["userid"], "recipeid"=>$row["recipeid"], "description"=>$row["description"], "parentID"=>$row["parentid"], "categoryid"=>$row["category"]);
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

	//public static function getRecipeSteps($recipeID){}

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
				$retval[] = Array("userid"=>$row["userid"], "recipeid"=>$row["recipeid"], "reviewid"=>$row["reviewID"], "description"=>$row["reviewTest"], "rating"=>$row["rating"]);
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
				$retval[] = Array("userid"=>$row["userid"], "recipeid"=>$row["recipeid"], "reviewid"=>$row["reviewID"], "description"=>$row["reviewTest"], "rating"=>$row["rating"]);
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
			$retval = Array(); // What's returned to  user
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

}