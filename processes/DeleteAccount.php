<?php
session_start();
$connection = new mysqli("localhost", "root", "", "recipes");

if($connection->connect_error){
	die("Error: ".$connection->connect_error);
}
if(!isset($_SESSION["userID"])){
		header('Location: ../MainPages/404.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <?php
            echo $_SESSION["userID"];

            $userID=intval($_SESSION["userID"]);
           
            if(isset($_SESSION["userID"])){
                    $sql ="DELETE FROM users WHERE userid=$userID";
                    $sql2= "DELETE FROM groups WHERE LeaderID=$userID";
                    $sql3= "DELETE FROM groupmembers WHERE UserID=$userID";
                    $sql4= "DELETE FROM following WHERE FollowerID=$userID OR FollowingID=$userID";
                    
                    if($connection->query($sql)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
                    if($connection->query($sql2)==TRUE)
                        echo "deleted groups";
                    else
                        echo "sad!";
                    if($connection->query($sql3)==TRUE)
                        echo "left groups";
                    else
                        echo "Sad!!";
                    if($connection->query($sql4)==TRUE)
                        echo "ditched followers";
                    else
                        echo "sad!";
            }

            $_SESSION["username"] = NULL;
            $_SESSION["userID"] = NULL;

            $connection->close();
            header('Location: WikiEats.php');
            exit();
    
        ?>  
    </body>