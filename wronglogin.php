<!-- TO DO:
	* Add verification for user login
-->

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add Recipe</title>

		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		
		 <script src="javascripts/addStep.js"></script>
	</head>
	
	<body>
		<?php include 'includes/wikieatsheader.php' ?>

		<div class="container">
			<div class="row">
				<h1>Login</h1>
				<h2>You failed the last time, Try again</h2>
			</div>

			<form class="form-horizontal col-md-8" method="POST" action="processes/ProcessLogin.php">
				<div class="form-group col-md-12">
					<label class="sr-only" for="username">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username"/>
				</div>
				<div class="form-group col-md-12">
					<label class="sr-only" for="password1">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Password"/>
				</div>

				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>

	</body>
</html>