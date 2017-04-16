<?php 
session_start();
$connection = new mysqli("localhost", "root", "", "recipes");

if($connection->connect_error){
	die("Error: ".$connection->connect_error);
}
if(!isset($_SESSION["group"])){
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
            echo $_SESSION["group"];

            $groupID= intval($_SESSION["group"]);
            if(isset($_SESSION["group"])){
                    $sql ="DELETE FROM groupmembers WHERE GroupID=$groupID";
                    $sql2="DELETE FROM groups WHERE GroupID=$groupID";
                    $sql3= "DELETE FROM pinnedrecipes WHERE GroupID=$groupID";
                    if($connection->query($sql)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
                    if($connection->query($sql2)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
                    if($connection->query($sql3)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
            }
            $connection->close();
            header('Location: ../MainPages/WikiEats.php');
	        exit();
           
           
        ?>  
    </body>