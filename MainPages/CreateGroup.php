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
			<div class="row">
				<h1>Create New Group</h1>
			</div>
			<form class="form-inline col-md-4" method="POST"  action="../processes/CreateGroupProcess.php" enctype="multipart/form-data">
				<div class="form-group col-md-12">
					<label class="control-label sr-only" for="groupname">Group Name</label>
					<input class="form-control" type="text" name="groupname" placeholder="Group Name"/>
				</div>

				<div class="form-group col-md-12">
  					<label class="control-label sr-only" for="groupdesc">Group Description</label>
  					<textarea class="form-control" rows="3" name="groupdesc" id="groupdesc">Group Description: Put a spicy hook for your group</textarea>
				</div>

				<div class="form-group col-md-12">
                	<label class="contol-label">Group Picture</label>
                	<input type ="file" name="grouppic" id="grouppic">
				</div>

				<button class="btn btn-primary" type="submit" name="submit">Create Group</button>
			</form>
		</div>
	</body>
</html>