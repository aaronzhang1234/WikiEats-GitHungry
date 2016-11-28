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
			<form method="POST"  action="processes/PostProcess.php" enctype="multipart/form-data">
				<fieldset>
				
					<div>
						<label>Title </br></label>
						<input type="text" name="recipiename"/>
						<input type="file" name="mainpic"></input></br>
					</div>
					
					<div>
						<label>Description</br></label>
						<textarea name = "description"></textarea>
					</div>
					<div>
						<label>Category</br>
							<select name ="FoodCategory">
								<option value=1>Breakfast</option>
								<option value=2>Lunch</option>
								<option value=3>Dinner</option>
								<option value=4>Dessert</option>
								<option value=5>Snack</option>
								<option value=6>Soup</option>
								<option value=7>Bread</option>
							</select>
					</div>
					
					<div id="steps">
					    <label class="numbered">Step 1</label>
						<textarea name ="step1"></textarea></br>
						Add a picture to help your readers out!
						<input type="file" name="image1"></input></br>
						<button type = "button" onclick="more()"> Add new Step</button></div>
					
					<input type="submit" name="submit" value="submit" onclick="checkAddRecipe(form)"></input>
				</fieldset>
			</form>
		</div>
	</body>
</html>