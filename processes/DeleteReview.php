<?php
session_start();
if(!isset($_POST["review"])){
    header('Location: ../MainPages/404.php');
    exit();
}
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
            echo $_POST["review"];
            echo "</br>";
            echo $_SESSION["userID"];

            $reviewID=intval($_POST["review"]);
            $userID= intval($_SESSION["userID"]);
            if(isset($_POST["review"]) && isset($_SESSION["userID"])){
                    $sql ="DELETE FROM reviews WHERE reviewID = $reviewID";
                    if($connection->query($sql)==TRUE)
                        echo "deleted!";
                    else
                        echo "sad!";
            }
            $connection->close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
	        exit();
           
        ?>  
    </body>