<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'includes/wikieatsheader.php' ?>
		
		 <script src="javascripts/addStep.js">
		</script>
	</head>
	
	<body>
		<form method="POST"  action="PostProcess.php">
			<fieldset>
				<div>
					<h2>User Info</h2>
					<div>
						<label>Username</label>
						<input type ="text" name="username"></input>
					</div>
					<div>
						<label>Email</label>
						<input type="email" name="email"></input>
					</div>
					
				</div>
				<br>
				<div>
					<h2>Recipe Info</h2>
					<div>
						<label>Title 
						<input type="text" name="recipiename"></input>
					</div>
					
					<div>
						<label>Description
						<textarea name = "description"></textarea>
					</div>
					
					<div id="steps">
						<label class="numbered">Step 1</label>
						<textarea name ="step1"></textarea></br>
						Add a picture to help your readers out!
						<input type="file" name="fileToUpload"></input></br>
						<button type = "button" onclick="more()"> Add new Step</button></div>
				</div>
				
				<input type="submit"></input>
			</fieldset>
		</form>
	</body>
</html>
