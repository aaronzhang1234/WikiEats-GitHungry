<?php
session_start();
$connection = new mysqli("localhost", "root", "", "recipes");

if($connection->connect_error){
	die("Error: ".$connection->connect_error);
}
if(!isset($_SESSION["group"])||!isset($_POST["transfer"])){
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
            echo $_POST["transfer"];

            $group=intval($_SESSION["group"]);
            $newLeader= intval($_POST["transfer"]);
            if(isset($_SESSION["group"]) && isset($_POST["transfer"])){
                $sql="UPDATE groups SET LeaderID = $newLeader WHERE GroupID=$group";
                if($connection->query($sql)==TRUE)
                        echo "changed!";
                    else
                        echo "sad!";
            }

            $connection->close();
            header('Location:'.$_SERVER['HTTP_REFERER']);
            exit();
            
           
           
        ?>  
    </body>