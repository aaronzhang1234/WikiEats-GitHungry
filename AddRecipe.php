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
			<form method="POST"  action="PostProcess.php">
				<fieldset>
				
					<div>
						<label>Title </br></label>
						<input type="text" name="recipiename"/>
					</div>
					
					<div>
						<label>Description</br></label>
						<textarea name = "description"></textarea>
					</div>
					
					<div id="steps">
					    <label class="numbered">Step 1</label>
						<textarea name ="step1"></textarea></br>
						Add a picture to help your readers out!
						<input type="file" name="fileToUpload"></input></br>
						<button type = "button" onclick="more()"> Add new Step</button></div>
					
					<input type="submit"></input>
				</fieldset>
			</form>
		</div>
	</body>
</html>

<!--
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
		<?php //include 'includes/wikieatsheader.php' ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
			<form class="form" method="POST"  action="http://www.randyconnolly.com/tests/process.php">
				<div class="form-group">
					<label class="sr-only" for="recipeName">Title</br></label>
					<input class="form=control" type="text" name="recipeName" placeholder="Title"/>
				</div>
				
				<div class="form-group">
					<label>Description</br></label>
					<textarea name="description" placeholder="Description"></textarea>
				</div>
				
				<div id="steps">
				    <label class="numbered">Step 1</label>
					<textarea name ="step1" placeholder="Step1"></textarea></br>
					Add a picture to help your readers out!
					<input type="file" name="fileToUpload"></input></br>
					<button type = "button" onclick="more()"> Add new Step</button></div>
				
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
				</div>
			</div>
		</div>
	</body>
</html>
-->