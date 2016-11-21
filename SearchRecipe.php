<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wiki Eats - Main</title>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">

		<!--<link href="chapter12-project02.css" rel="stylesheet">-->
	</head>

	<body>
		<!-- Header -->
		<?php include 'includes/wikieatsheader.php';?>
	
		<!-- Main Body -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Search Results for "<?php if(isset($_GET["recipe"])) echo $_GET["recipe"]; ?>"<h1>
					<p>
		 		</div>
		 	</div>
		 </div>

	</body>
</html>