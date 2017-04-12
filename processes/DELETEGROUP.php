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
            echo $_SESSION["group"];
/*
            $groupID= intval($_SESSION["group"]);
            if(isset($_SESSION["group"])){
                    $sql ="DELETE FROM groupmembers WHERE GroupID=$groupID";
                    $sql2="DELETE FROM grouups WHERE GroupID=$groupID";
                    sql3= "DELETE FROM pinnedrecipes WHERE GroupID+$groupID";
                    if($connection->query($sql)==TRUE)
                        echo "added!";
                    else
                        echo "sad!";
            }
            $connection->close();
            header('Location: ../MainPages/Social.php');
	        exit();
   */        
        ?>  
    </body>