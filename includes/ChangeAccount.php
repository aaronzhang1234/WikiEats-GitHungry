<button id="changeAccount" class="btn btn-success"><span class="glyphicon glyphicon-cog"></span></button>


<form id="changeAccountForm" class="form-horizontal hidden" method="POST"  action="../processes/ChangeAccount.php" enctype="multipart/form-data">
	<button type="button" id="closeAccountBtn" class="btn col-md-1"><span class="glyphicon glyphicon-remove"></span></button>
    </br>
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
    </br>
    <label>Please confirm your old password </label>
    <input type ="password" name= "password" id="password"/>
    </br>
	<button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
</form>

<form id="deleteAccount" class="form-horizontal hidden" method="POST" action="../processes/DeleteAccount.php">
    <button class="btn btn-primary" type="submit" name="submit"><span class ="glyphicon glyphicon-trash">Delete Account</span></button>
</form>
