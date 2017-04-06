<?php

$username="root";$password="";$database="recipes";
$mysqli= mysql_connect('localhost',$username,$password);

mysql_select_db($database,$mysqli);

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
                        if(mysql_query($sql)){
                            echo "added!";
                        }else{
                            echo "sad :(";
                        }
                        $sqllast ="SELECT GroupID FROM groups ORDER BY GroupID DESC LIMIT 1";
                        
                        $result = mysql_query($sqllast);
                        $number = mysql_result($result,0);
                        $sql="INSERT INTO groupmembers(UserID,GroupID)
                        VALUES ('".$_SESSION["userID"]."','$number')";
                         if(mysql_query($sql)){
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
            header('Location: ../MainPages/Social.php');
            exit();
        ?>
    </body>