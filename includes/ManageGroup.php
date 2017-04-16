<div class='col-md-12'>
<button id="manageGroupBtn" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit Group</button>
<form id="managegroup" class="form-horizontal hidden row" method="POST" action="../processes/ManageGroup.php">
    <div class='col-md-12'>
	   <button class="btn btn-danger" type="button" id="closeManageGroup" class="btn col-md-1"><span class="glyphicon glyphicon-remove"></span></button>
    </div>

    <?php
    $delClass = "'col-md-8 col-md-offset-1'";

    $groupmembers = RecipeDB::getGroupMembers($_GET["groupID"]);
    if(count($groupmembers)>1){
        echo '<div class="col-md-4">';
        echo '  <div class="col-md-12">';
        echo '      <em>Transfer Group To User: </em>';
        echo '      <select class="" name="transfer" id="transfer">';
            foreach($groupmembers as $member){
                $fullmember = RecipeDB::getUserByID($member["UserID"]);
                $isLeader = RecipeDB::isGroupLeader($fullmember['userid'],$_GET['groupID']);
                if(!$isLeader){
                    echo "<option value=".$fullmember['userid'].">".$fullmember['username']."</option>";
                }
            }
        
        echo '      </select>';
        echo '  </div>';
        echo '<div class="col-md-12"><button type="submit" class="btn btn-success btn-sm">Save Changes</button></div>';
        echo '</div>';

        $delClass="'col-md-8'";
    }
    ?>

    <div class=<?php echo $delClass; ?>>
        <a href="../processes/DELETEGROUP.php" onclick ="deleteGroup()"><button class="btn btn-warning btn-sm"><span class ="glyphicon glyphicon-trash"> Delete Group</span></button></a>
    </div>
</form>
</div>