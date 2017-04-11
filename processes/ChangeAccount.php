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
            $usernameChange= ctype_space($_POST["newusername"])||empty($_POST["newusername"]);
            echo $_POST["newusername"];
            $firstnameChange= ctype_space($_POST["firstname"])||empty($_POST["firstname"]);
            echo $_POST["firstname"];
            $lastnameChange= ctype_space($_POST["lastname"])||empty($_POST["lastname"]);
            echo $_POST["lastname"];
            $passwordChange=ctype_space($_POST["newpassword"])||empty($_POST["newpassword"]);
            echo $_POST["newpassword"];
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
                    if(!$usernameChange){
                        $newUserName = $_POST["newusername"];
                        $sql = "SELECT * FROM users WHERE username='$newUserName'";
                        $result =$connection->query($sql);
                        if($result->num_rows===0){
                            $sql ="UPDATE users SET username='$newUserName' WHERE userid=$user";
                            if($connection->query($sql)){
                                echo "Changed user name";
                            }else{
                                echo "failed to change user name";
                            }
                        }else{
                            echo "username is already in use";
                        }
                    }
                    if(!$firstnameChange){
                        $newFirstName = $_POST["firstname"];
                        $sql ="UPDATE users SET firstname='$newFirstName' WHERE userid=$user";
                        if($connection->query($sql)){
                            echo "Changed first name";
                        }else{
                            echo "failed to change first name";
                        }
                    }
                    if(!$lastnameChange){
                        $newLastName = $_POST["lastname"];
                        $sql ="UPDATE users SET lastname='$newLastName' WHERE userid=$user";
                        if($connection->query($sql)){
                            echo "Changed last name";
                        }else{
                            echo "failed to change last name";
                        }
                    }
                    if(!$passwordChange){
                        $newPassword = MD5($_POST["newpassword"]);
                        $sql ="UPDATE users SET password='$newPassword' WHERE userid=$user";
                        if($connection->query($sql)){
                            echo "Changed password";
                        }else{
                            echo "failed to change password";
                        }
                    }
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