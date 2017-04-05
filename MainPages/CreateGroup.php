<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Add Group</title>

		<link href="../bootstrap3_defaultTheme/dist/css/bootstrap.css" rel="stylesheet">
		
	</head>
	
	<body>
		<?php include '../includes/wikieatsheader.php' ?>
		<div class="container">
			<form method="POST"  action="../processes/CreateGroupProcess.php" enctype="multipart/form-data">
				<label>Group Name</label>
                <input type ="text" name ="groupname" id="groupname" placeholder="The name of your group"/>
                </br>
                <label>Group Description</label>
                <input type ="text" name = "groupdesc" id="groupdesc" placeholder="Put a spicy hook for your group"/>
                </br>
                <label>Group Picture</label>
                <input type ="file" name="grouppic" id="grouppic">
                </br>
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>
			</form>
		</div>
	</body>
</html>