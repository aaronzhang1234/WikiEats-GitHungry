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
				<h1>Create New Account</h1>
			</div>

			<form class="form-horizontal" method="POST" action="http://www.randyconnolly.com/tests/process.php">
				<div class="form-group col-md-12">
					<label class="sr-only" for="userName">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username"/>
				</div>
				<div class="form-group col-md-6">
					<label class="sr-only" for="fName">First Name</label>
					<input class="form-control" type="text" name="fName" placeholder="First Name"/>
				</div>

				<div class="form-group col-md-6">
					<label class="sr-only" for="lName">Last Name</label>
					<input class="form-control" type="text" name="lName" placeholder="Last Name"/>
				</div>

				<div class="form-group col-md-12">
					<label class="sr-only" for="email">Email</label>
					<input class="form-control col-md-6" type="text" name="email" placeholder="Email"/>
				</div>

				<div class="form-group col-md-12">
					<label class="sr-only" for="password1">Password</label>
					<input class="form-control" type="password" name="password1" placeholder="Password"/>
				</div>

				<div class="form-group col-md-12">
					<label class="sr-only" for="password2">Re-Type Password</label>
					<input class="form-control" type="password" name="password2" placeholder="Re-Type Password"/>
				</div>

				<button type="submit" class="btn btn-primary">Create New Account</button>
			</form>
		</div>

	</body>
</html>