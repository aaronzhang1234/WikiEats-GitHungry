<?php
 $username ="root";$password="";$database="recipes";
 $mysqli= new mysqli("localhost",$username,$password);
 $mysqli-> select_db($database);
 ?>
 <?php
 include '../includes/AccessDatabase.php';
 ?>

 <!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include '../includes/wikieatsheader.php'; ?>
        <div class="container">
            <div class= "row">
                <div class ="panel-group panel-success col-md-6">
                    <h1 class ="col-md-12 panel-heading">GROUPS <a href="CreateGroup.php"><button class="btn-success btn-sm">Create Group</button></a></h1>
                    <div class="panel-body">
                        <?php 
                            echo "<h1>Top Groups</h1>";
                            $topGroups = RecipeDB::getTopGroups(5);
                            foreach($topGroups as $group){
                                $groupe=RecipeDB::getGroup($group['GroupID']);  
                                DisplayDB::printGroups($groupe);
                            }
                        ?>
                        <?php
                            
                            if(isset($_SESSION["userID"])){
                                $groupsin = RecipeDB::getGroupsIn($_SESSION["userID"]);
                                if(count($groupsin)!=0){
                                    echo "<h1>Groups In</h1>";
                                    foreach($groupsin as $group){
                                        $groupe=RecipeDB::getGroup($group['GroupID']);  
                                        DisplayDB::printGroups($groupe);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php
                $users=RecipeDB::getFollowing($_SESSION["userID"]);
                ?>

                <?php if(count($users)!=0)
                {
                    echo "<div class='panel-group panel-success col-md-6'>";
                        echo "<h1 class='panel-heading'>Following <small>(".count($users).")</small></h1>";
                        
                        echo "<div class='panel-body'>";             
                                // Prints each user found
                                foreach($users as $user){
                                    $actualuser= RecipeDB::getUserByID($user["FollowingID"]);
                                    DisplayDB::printUser($actualuser);
                                }
                        echo "</div>";
                    echo "</div>";
                }
            ?>
            </div>
        </div>
        
    </body>