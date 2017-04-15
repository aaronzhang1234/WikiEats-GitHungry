<button id="changeAccount" class="btn btn-success"><span class="glyphicon glyphicon-cog"></span></button>

<script src="../javascripts/rusure.js"></script>
<form id="changeAccountForm" class="form-inline hidden col-md-8 col-md-offset-1" method="POST"  action="../processes/ChangeAccount.php" enctype="multipart/form-data">
	<button type="button" id="closeAccountBtn" name="closeAccountBtn" class="btn col-md-1 btn-danger"><span class="glyphicon glyphicon-remove"></span></button>


    <div class="form-group col-md-12">
        <label class="control-label sr-only" for="newusername">Username</label>
        <input class="form-control" type="text" name="newusername" placeholder="Username"/>
    </div>

    <div class="form-group col-md-6">
        <label class="control-label sr-only" for="fName">First Name</label>
        <input class="form-control" type="text" name="firstname" placeholder="First Name"/>
    </div>

    <div class="form-group col-md-6">
        <label class="sr-only" for="fName">First Name</label>
        <input class="form-control" type="text" name="lastname" placeholder="Last Name"/>
    </div>

    <div class="form-group col-md-12">
        <label class="sr-only" for="newpassword">New Password</label>
        <input class="form-control" type="password" name="newpassword" placeholder="New Password"/>
    </div>

    <div class="form-group col-md-12">
        <label class="sr-only" for="password">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Old Password"/>
    </div>

	<button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
</form>
<div class='row'>
<form id="deleteAccount" class="form-horizontal hidden col-md-12" method="POST" action="../processes/DeleteAccount.php">
    <button class="btn btn-primary" onclick="deleteAccount()" type="submit" name="submit"><span class ="glyphicon glyphicon-trash"> Delete Account</span></button>
</form>
</div>
