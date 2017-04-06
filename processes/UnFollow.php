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
            echo $_SESSION["follow"];
            echo "</br>";
            echo $_SESSION["userID"];

            $followerID=intval($_SESSION["userID"]);
            $followingID= intval($_SESSION["follow"]);
            if(isset($_SESSION["follow"]) && isset($_SESSION["userID"])){
                    $sql ="DELETE FROM following WHERE FollowerID=$followerID AND FollowingID=$followingID";
                    if($connection->query($sql)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
            }
            $connection->close();
        ?>  
    </body>