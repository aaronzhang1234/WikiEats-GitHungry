<button id="manageGroupBtn" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>
<form id="managegroup" class="form-horizontal hidden" method="POST" action="../processes/ManageGroup.php">
	<button type="button" id="closeManageGroup" class="btn col-md-1"><span class="glyphicon glyphicon-remove"></span></button>
    <?php
    $groupmembers = RecipeDB::getGroupMembers($_GET["groupID"]);
    if(count($groupmembers)>1){
        echo '<select name="transfer" id="transfer">';
            foreach($groupmembers as $member){
                $fullmember = RecipeDB::getUserByID($member["UserID"]);
                $isLeader = RecipeDB::isGroupLeader($fullmember['userid'],$_GET['groupID']);
                if(!$isLeader){
                    echo "<option value=".$fullmember['userid'].">".$fullmember['username']."</option>";
                }
            }
        
        echo '</select>';
        echo "</br>";
        echo '<button type="submit" class="btn btn-success">Save Changes</button>';
    }
    ?>
    <a href="../processes/DELETEGROUP.php" onclick ="deleteGroup()"><span class ="glyphicon glyphicon-trash">Delete Group</span></a>
    </form>