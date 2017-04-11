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
			<form method="POST"  action="../processes/ChangeAccount.php" enctype="multipart/form-data">
				<label>New UserName</label>
                <input type ="text" name ="newusername" id="newusername" />
                </br>
                <label>Change First Name</label>
                <input type ="text" name = "firstname" id="firstname"/>
                </br>
                <label>Change Last Name</label>
                <input type ="text" name = "lastname" id="lastname"/>
                </br>
                <label>New Password</label>
                <input type ="password" name = "newpassword" id="newpassword"/>
`               </br>
                <label>Please confirm your old password </label>
                <input type ="password" name= "password" id="password"/>
                </br>
				<button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
			</form>
		</div>
	</body>
</html>