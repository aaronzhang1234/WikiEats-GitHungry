<?php

    $connection = new mysqli("localhost", "root", "", "recipes");

	if($connection->connect_error){
		die("Error: ".$connection->connect_error);
	}
    
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <?php
            echo $_POST["groupname"];
            echo "</br>";
            echo $_POST["groupdesc"];
            echo "</br>";
            
			if (isset($_FILES["grouppic"]["name"])) {

                $titleimagename=$_FILES['grouppic']['name'];
			    $imagemain_temp=$_FILES['grouppic']['tmp_name'];
                    if(move_uploaded_file($imagemain_temp,"../images/grouppics/".$titleimagename)){
                        $sql= "INSERT INTO groups(GroupName,GroupDescription,LeaderID,GroupPicture)
                        VALUES ('".$_POST['groupname']."','".$_POST['groupdesc']."','".$_SESSION['userID']."','$titleimagename')";
                        if($connection->query($sql)==TRUE){
                            echo "added!";
                        }else{
                            echo "sad :(";
                        }
                        $sqllast ="SELECT GroupID FROM groups ORDER BY GroupID DESC LIMIT 1";
                        
                        $result = $connection->query($sqllast);
                        $result2 = $result -> fetch_assoc();
                        $number =$result2['GroupID'];

                        $sql="INSERT INTO groupmembers(UserID,GroupID)
                        VALUES ('".$_SESSION["userID"]."','$number')";
                         if($connection->query($sql)==TRUE){
                            echo "added!";
                        }else{
                            echo "sad :(";
                        }
                    }
                    else{
                        echo "nay";
                    }
                } else {
                    echo 'please choose a file';
                }
        ?>
        <?php
        
            header('Location: ../MainPages/WikiEats.php');
            exit();
            
        ?>
    </body>