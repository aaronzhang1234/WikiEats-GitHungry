<!-- TO DO:
	* Add Search Bar Functionality
	* Figure out look for header
-->
<!-- Can change navbar be about the user-->
<header>
	<div id="topHeaderRow">
		<div class="container">
			<div class="pull-left">
				<strong>WikiEats - GitHungry</strong>
			</div>
			<div class="pull-right">
				<ul class="list-inline">
					<li><a href="WikiEats.php">Home</a></li>
					<li><a href=#>Contact Us</a></li>
					<li><a href=#>About Us</a></li>
					<?php // Changes based on if user's logged in
					if(isset($loggedIn) && $loggedIn == true)
						echo '
					<li><a href="addRecipe.php">Submit Recipe</a></li>
					<li><a href=#>Account</a></li>
					<li><a href=#>Logout</a></li>';
					else
						echo '
					<li><a href=#>Create Account</a></li>
					<li><a href=#>Login</a></li>
						';
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="navbar navbar-inverse">
		<div class="container">
			<nav>
				<div class="navbar-header">
					<a class="navbar-brand" href="WikiEats.php">WikiEats - GitHungry</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="WikiEats.php">Home</a></li>
					<li><a href=#>Contact Us</a></li>
					<li><a href=#>About Us</a></li>
					<?php // Changes based on if user's logged in
					if(isset($loggedIn) && $loggedIn == true)
						echo '
					<li><a href="addRecipe.php">Submit Recipe</a></li>
					<li><a href=#>Account</a></li>
					<li><a href=#>Logout</a></li>';
					else
						echo '
					<li><a href=#>Create Account</a></li>
					<li><a href=#>Login</a></li>
						';
					?>
				</ul>
				<ul class="nav navbar-right">
					<li>
						<form class="form-inline">
							<div class="form-group">
							<input type="text" class="form-control" placeholder="Search Recipes" name="recipe">
							</div>
							<button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
						</form>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<!-- From ch2-proj1 travel-header.php
<header>
   <div id="topHeaderRow">
      <div class="container">
         <div class="pull-right">
            <ul class="list-inline">
              <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
            </ul>         
         </div>
      </div>
   </div>  
   
    <div class="navbar navbar-default ">
      <div class="container">
         <nav>
           <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="#">Share Your Travels</a>
           </div>
           <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
               <li><a href="#">Home</a></li>
               <li><a href="#about">About</a></li>
               <li><a href="#contact">Contact</a></li>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Posts</a></li>
                   <li><a href="#">Images</a></li>
                   <li class="divider"></li>
                   <li><a href="#">Countries</a></li>
                   <li><a href="#">Users</a></li>                
                 </ul>
               </li>
             </ul>
           </div>
        </nav>
      </div>
    </div>  
</header>


-->