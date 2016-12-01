<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Create Account</title>

		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		
		 <script src="javascripts/addStep.js"   ></script>
		 <script src="javascripts/checkForms.js"></script>
		<link rel="stylesheet" type="text/css" href="includes/wiki-eats.css" >
	</head>
	
	<body>
		<?php include 'includes/wikieatsheader.php' ?>

		<div class="container">
			<div class="row">
				<h1>Create New Account</h1>
			</div>

			<form class="form-inline col-md-8" method="POST" action="processes/CreateAccountProcess.php">
				<div class="form-group col-md-12">
					<label class="control-label sr-only" for="userName">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username"/>
				</div>

				<div class="form-group col-md-6">
					<label class="control-label sr-only" for="fName">First Name</label>
					<input class="form-control" type="text" name="fName" placeholder="First Name"/>
				</div>

				<div class="form-group col-md-6">
					<label class="sr-only" for="fName">First Name</label>
					<input class="form-control" type="text" name="lName" placeholder="Last Name"/>
				</div>

				<div class="form-group col-md-12">
					<label class="sr-only" for="password1">Password</label>
					<input class="form-control" type="password" name="password1" placeholder="Password"/>
				</div>

				<div class="form-group col-md-12">
					<label class="sr-only" for="password2">Re-Type Password</label>
					<input class="form-control" type="password" name="password2" placeholder="Re-Type Password"/>
				</div>

				<div class="checkbox col-md-12">
					<label><input type="checkbox" name="privacy" value=""> I agree to the <a href="#">privacy policy</a></label>
				</div>

				<button type="submit" onclick="checkCreateAccount(form)" class="btn btn-primary">Create New Account</button>
			</form>
		</div>

	</body>
</html>