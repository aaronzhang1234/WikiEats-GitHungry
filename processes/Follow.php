<?php
session_start();
$connection = new mysqli("localhost", "root", "", "recipes");

if($connection->connect_error){
	die("Error: ".$connection->connect_error);
}
if(!isset($_SESSION["follow"])||!isset($_SESSION["userID"])){
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
            echo $_SESSION["follow"];
            echo "</br>";
            echo $_SESSION["userID"];

            $followerID=intval($_SESSION["userID"]);
            $followingID= intval($_SESSION["follow"]);
            if(isset($_SESSION["follow"]) && isset($_SESSION["userID"])){
                    $sql ="INSERT INTO following (FollowerID,FollowingID)
                    VALUES ('".$followerID."','".$followingID."')";
                    if($connection->query($sql)==TRUE)
                        echo "added!";
                    else
                        echo "sad!";
            }
            $connection->close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
        ?>  
    </body>