<button id="writeReviewBtn" class="btn btn-success <?php echo ($loggedIn)?"":"hidden"; ?>"><span class="glyphicon glyphicon-pencil"></span> Write A Review</button>

<form id="writeReview" class="form-horizontal hidden" method="POST" action="../processes/reviewProcessing.php">
	<h3 class="col-md-11">Write A Review</h3>
	<button type="button" id="closeWriteReview" class="btn col-md-1"><span class="glyphicon glyphicon-remove"></span></button>
	<div class="form-group col-md-12">
		<label class="sr-only" for="Title">Subject</label>
		<input class="form-control" type="text" name="Title" placeholder="Title"></input>
	</div>
	<div class="form-group col-md-12">
		<label class="sr-only" for="review">Review</label>
		<textarea class="form-control" name="review" placeholder="Review Details"></textarea>
	</div>
	 <li class="rating">
        <input type="radio" name="rating" value="0" checked /><span class="hide"></span>
        <input type="radio" name="rating" value="1" /><span></span>
        <input type="radio" name="rating" value="2" /><span></span>
        <input type="radio" name="rating" value="3" /><span></span>
        <input type="radio" name="rating" value="4" /><span></span>
        <input type="radio" name="rating" value="5" /><span></span>
    </li>
	<button type="submit" class="btn btn-success">Submit Review</button>
</form>