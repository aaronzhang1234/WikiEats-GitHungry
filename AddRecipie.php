<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'includes/wikieatsheader.php' ?>
		
		 <script src="javascripts/addStep.js">
		</script>
	</head>
	
	<body>
		<form method="POST"  action="http://www.randyconnolly.com/tests/process.php">
			<fieldset>
			
				<div>
					<label>Title </br>
					<input type="text" name="recipie name"/>
				</div>
				
				<div>
					<label>Description</br>
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
	</body>
</html>
