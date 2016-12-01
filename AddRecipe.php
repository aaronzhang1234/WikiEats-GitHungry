<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add Recipe</title>

		<link href="bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		
		 <script src="javascripts/addStep.js"></script>
		 <script src="javascripts/checkForms.js"></script>
	</head>
	
	<body>
		<?php include 'includes/wikieatsheader.php' ?>
		<div class="container">
			<form class="form-horizontal col-md-8" method="POST"  action="processes/PostProcess.php" enctype="multipart/form-data">
				
					<div class="form-group row">
						<label class="col-md-2 control-label" for="recipiename">Title</label>
						<div class="col-md-10">
							<input class="form-control" type="text" name="recipiename" id="recipiename" placeholder="Something to grab people's attention"/>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-md-2 control-label">Main Image</label>
						<div class="col-md-10">
							<label class="custom-file">
								<input class="custom-file-input" type="file" name="mainpic" id="mainpic">
								<span class="custom-file-control"></span>
							</label>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 control-label" for="description">Description</label>
						<div class="col-md-10">
							<textarea class="form-control" name="description" id="description"></textarea>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-md-2 control-label" name="FoodCategory" for="FoodCategory">Category</label>
						<div class="col-md-10">
							<select class="form-control col-md-10" name ="FoodCategory" id="FoodCategory">
								<option value=1>Breakfast</option>
								<option value=2>Lunch</option>
								<option value=3>Dinner</option>
								<option value=4>Dessert</option>
								<option value=5>Snack</option>
								<option value=6>Soup</option>
								<option value=7>Bread</option>
							</select>
						</div>
					</div>
					
					<div id="steps" class="form-group row">
					    <label class="numbered col-md-2 control-label">Step 1</label>
						<textarea class="col-md-5" name="step1"></textarea>
						<input class="col-md-5" type="file" name="image1"></input>
						<br>

						<button class="col-md-12" type="button" onclick="more()"> Add new Step</button>
					</div>

					<!--<input type="submit" name="submit" value="submit" onclick="checkAddRecipe(form)"></input>-->	

					<button type="submit" name="submit" value="submit" onclick="checkAddRecipe(form)">
			</form>
		</div>
	</body>
</html>