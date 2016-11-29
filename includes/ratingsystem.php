<form method ="POST" action="processes/reviewProcessing.php">
	<label>Subject</label>
	<input type ="text" name="Title"></input>
	</br>
	<label>Review</label>
	<textarea name = "review"></textarea>
	</br>
	 <li class="rating">
        <input type="radio" name="rating" value="0" checked /><span class="hide"></span>
        <input type="radio" name="rating" value="1" /><span></span>
        <input type="radio" name="rating" value="2" /><span></span>
        <input type="radio" name="rating" value="3" /><span></span>
        <input type="radio" name="rating" value="4" /><span></span>
        <input type="radio" name="rating" value="5" /><span></span>
    </li>
	<input type='submit'  class="btn btn-success"  ></input>
</form>