<form class="form-horizontal" method ="POST" action="processes/reviewProcessing.php">
	<h3>Write A Review</h3>
	<div class="form-group col-md-12">
		<label class="sr-only" for="Title">Subject</label>
		<input class="form-control" type="text" name="Title" placeholder="Title"></input>

					<!--<label class="sr-only" for="username">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username"/>-->
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