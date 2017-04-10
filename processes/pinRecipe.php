<?php
session_start();
$connection = new mysqli("localhost", "root", "", "recipes");

if($connection->connect_error){
	die("Error: ".$connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <?php
            echo $_POST["pin"];
            echo $_SESSION["recipeID"];
            $groupID= intval($_POST["pin"]);
            $recipeID= intval($_SESSION["recipeID"]);
            if(isset($_POST["pin"])&& isset($_SESSION["recipeID"])){

                   $sql="INSERT INTO pinnedrecipes(GroupID,RecipeID) 
                           VALUES ($groupID,$recipeID)";
                    if($connection->query($sql)==TRUE)
                        echo "added!";
                    else
                        echo "sad!";
            
            }
            $connection->close();
        ?>  
    </body>