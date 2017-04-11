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
            echo empty($_POST["newusername"]);
            echo $_POST["newusername"];
            echo "</br>";
            echo empty($_POST["firstname"]);
            echo $_POST["firstname"];
            echo "</br>";
            echo empty($_POST["lastname"]);
            echo $_POST["lastname"];
            echo "</br>";
            echo empty($_POST["newpassword"]);
            echo $_POST["newpassword"];
             echo "</br>";
            echo empty($_POST["password"]);
            echo $_POST["password"];

            $password = MD5($_POST["password"]);
            $user = intval($_SESSION['userID']);
            echo $password;
            
            $sql = "SELECT * FROM users WHERE userid=$user AND Password ='$password'";
            $result = $connection->query($sql); // Does query
            if($result){
                if($result->num_rows==0){
                     echo "wrong password";
                }else{
                    echo "correct password";
                 }
            }else{
                echo "f u g";
            }


            /*$followerID=intval($_SESSION["userID"]);
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
            header('Location: ../MainPages/Social.php');
            */
        ?>  
    </body>