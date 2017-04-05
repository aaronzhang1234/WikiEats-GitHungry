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
        <a href="CreateGroup.php">Create Group</a>
        <?php 
            $topGroups = RecipeDB::getTopGroups(5);
            if($topGroups==NULL){
                echo "meme";
            }
            foreach($topGroups as $group){
              echo implode("?",$group);
              echo $group['0'];
              
              
            }
        ?>
        
    </body>