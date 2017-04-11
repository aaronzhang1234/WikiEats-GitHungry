<?php 
// Classes for accessing and displaying items from a database

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

		$sql = "SELECT * FROM generalRecipes WHERE recipeid =$recipeID";

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
		$amount = ($amount < count($recipes))? $amount: count($recipes);
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
	public static function getTopPeopleByRecipes(){

		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT userid,COUNT(recipeid) FROM generalrecipes GROUP BY userid ORDER BY COUNT(recipeid) DESC LIMIT 5";
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
	public static function getTopPeopleByReviews(){

		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT userid,COUNT(reviewID) FROM reviews WHERE userid IN (SELECT userid FROM users) GROUP BY userid ORDER BY COUNT(reviewID) DESC LIMIT 5";
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
	public static function isInGroup($groupID,$userID)
	{
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM groupmembers WHERE UserID = $userID AND GroupID=$groupID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query

		if($result->num_rows===0)
			return FALSE;
		else
			return TRUE;
	}
	public static function getGroup($groupID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);

		$sql = "SELECT * FROM groups WHERE GroupID = $groupID ";

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
	public static function getTopGroups($amount)
	{
	 	// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT GroupID,COUNT(UserID) FROM groupmembers GROUP BY GroupID ORDER BY COUNT(UserID) DESC LIMIT $amount";

		// Performs query and stores values
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
	public static function getGroupsIn($userID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT GroupID FROM groupmembers WHERE UserID=$userID";

		// Performs query and stores values
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
	public static function getRecipesByGroups($groupID){
			// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT generalrecipes.recipeid FROM generalrecipes LEFT JOIN groupmembers ON generalrecipes.userid=groupmembers.UserID 
				WHERE groupmembers.GroupID=$groupID ORDER BY recipeid DESC LIMIT 5";

		// Performs query and stores values
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
	public static function leadsGroups($userID)
	{
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM groups WHERE LeaderID = $userID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query

		if($result->num_rows===0){
			return NULL;
		}
		else
		{
			$retval = Array();
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}

	}
	public static function isGroupLeader($userID,$groupID)
	{
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM groups WHERE LeaderID = $userID AND GroupID=$groupID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query

		if($result->num_rows===0)
			return FALSE;
		else
			return TRUE;
	}

	public static function isPinned($groupID,$recipeID)
	{
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM pinnedrecipes WHERE RecipeID = $recipeID AND GroupID=$groupID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query

		if($result->num_rows===0)
			return FALSE;
		else
			return TRUE;
		
	}
	public static function getPinnedRecipes($groupID){
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT RecipeID FROM pinnedrecipes WHERE GroupID = $groupID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query

		if($result->num_rows===0){
			return NULL;
		}
		else
		{
			$retval = Array();
			while($row = $result->fetch_assoc())
				$retval[] = $row;
			return $retval;
		}
	}
	public static function isFollowing($userID,$otherUserID)
	{
		
	 	// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM following WHERE FollowerID = $userID AND FollowingID= $otherUserID";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query
		if($result->num_rows===0) // If result has been found
			return FALSE;
		else 
			return TRUE;
	}

	public static function getFollowing($userID)
	{
	 	// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT FollowingID FROM following WHERE FollowerID=$userID";  

		// Performs query and stores values
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
	public static function getFollowers($userID)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT FollowerID FROM following WHERE FollowingID=$userID";  

		// Performs query and stores values
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

	// Gets Related Recipes: recipes by the user and of the same category
	public static function getRelatedRecipes($userID, $categoryID, $recipeID, $amount)
	{
		// Makes a connection to the database
		$connection = new mysqli("localhost", "root", "", "recipes");
  
		if($connection->connect_error)
			die("Error: ".$connection->connect_error);
		
		$sql = "SELECT * FROM generalRecipes WHERE (category LIKE '".$categoryID."' OR userid LIKE '".$userID."') AND recipeid NOT LIKE '".$recipeID."'";

		// Performs query and stores values
		$result = $connection->query($sql); // Does query
		if($result) // If result has been found
		{
			// Gets Query Values
			$res = Array();
			while($row = $result->fetch_assoc())
				$res[] = $row;

			// Decides how many random recipes to get
			$amount = ($amount < count($res))? $amount: count($res);
			$keys = Array();
			if($amount > 0)
				if($amount > 1)
					$keys = array_rand($res, $amount); // Gets random keys
				else
					$keys[] = array_rand($res, $amount); // Gets random key

			// Gets random recipes from query
			$retval = Array();
			for($i = 0; $i < count($keys); $i++) // Gets key items
				$retval[] = $res[$keys[$i]];
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
								<h2><a href="DisplayRecipe.php?recipeID='.$recipe["recipeid"].'">'.$recipe["Title"].'</a> <small>(<a href="DisplayCategory.php?categoryID='.$recipe["category"].'">'.$category.'</a>) by <a href="DisplayAccount.php?userID='.$recipe["userid"].'">'.$username.'</a></small></h2>
							</div>
							<div class="col-md-4">
								<img src="../images/'.$imageFileName.'" alt="'.$imageFileName.'" class="img-thumbnail" /> 
							</div>
							<div class="col-md-8">
								<h4>'.round($averageReview, 1).'/5</h4>
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
	public static function printGroups($group)
	{
		$id = $group["GroupID"];
		$name = $group["GroupName"];
		$desc = $group["GroupDescription"];
		$imageFileName = ($group["GroupPicture"] != "")? $group["GroupPicture"]: "chef_hat.png";
		echo '
			<div class="col-md-12 panel">
				<div class="col-md-4">
					<img src="../images/grouppics/'.$imageFileName.'" class="img-thumbnail" /> 
				</div>
				<div class="col-md-8">
					<h3><a href="DisplayGroup.php?groupID='.$id.'">'.$name.'</a></h3>
					<p>'.$desc.'</p>
				</div>
			</div>
			<hr/>';
	}
}