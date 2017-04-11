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
            echo "</br>";
            echo $_SESSION["userID"];

            $joiningID=intval($_SESSION["userID"]);
            $groupID= intval($_SESSION["group"]);
            if(isset($_SESSION["group"]) && isset($_SESSION["userID"])){
                    $sql ="INSERT INTO groupmembers (UserID,GroupID)
                    VALUES ('".$joiningID."','".$groupID."')";
                    if($connection->query($sql)==TRUE)
                        echo "added!";
                    else
                        echo "sad!";
            }
            $connection->close();
            header('Location: ../MainPages/Social.php');
	        exit();
           
        ?>  
    </body>