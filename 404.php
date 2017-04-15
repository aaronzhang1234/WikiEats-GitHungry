 <!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../includes/wiki-eats.css" >
        <link rel="stylesheet" href="../css/404.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <?php include '/includes/wikieatsheader.php'; ?>
        <?php $random = rand(1,7);
        echo $random;
        if($random==1){
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/boilwater.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";        
        }elseif($random==2){     
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/microwavefire.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";
        }elseif($random==3){
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/homercooking.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";
        }elseif($random==4){
           echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/willsmithfail.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";              
        }elseif($random==5){
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/stich.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";
        }elseif($random==6){
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/eggs.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";
        }elseif($random==7){
            echo "<div style='position:absolute;z-index:0;left:0;top:0;width:100%;height:100%'>";
               echo  "<img src='../images/404pics/panda.gif' style='width:100%;height:100%' alt='[]' />";
            echo "</div>";
        }
        ?>

        <h1 id="four">404</h1>
        <h1 id="notfound">Page not found</h1>
        
    </body>