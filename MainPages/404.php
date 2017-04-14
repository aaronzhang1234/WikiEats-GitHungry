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
        <?php $random = rand(1,7);
        echo $random;
        if($random==1){
            echo '<img style="display:block;margin:auto;" src = "../images/wrongarea.jpg"></img>';       
        }elseif($random==2){     
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/microwavefire.gif"></img>'; 
        }elseif($random==3){
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/homercooking.gif"></img>';                  
        }elseif($random==4){
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/willsmithfail.gif"></img>';              
        }elseif($random==5){
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/stich.gif"></img>';
        }elseif($random==6){
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/eggs.gif"></img>';
        }elseif($random==7){
            echo '<img style="display:block;margin:auto;" src= "../images/404pics/panda.gif"></img>';
        }
        ?>

        <h1 style="text-align:center;">404</h1>
        <h1 style="text-align:center;">Page not found</h1>
        
    </body>