<!DOCTYPE html>
<html>
	<head>
	<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
	<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/slider.css' />
	<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
	<meta charset="utf-8">
		<title> Co-Own My Pet </title>
	</head>

	<body>
		<div class='homepage_top'>
		
			<input type='button' value="<?php if($_SESSION['loggedIn'] == TRUE){
										echo 'Profile';
										}
										else {
										echo 'Sign In';
										} ?>"
			style='float: right;' onclick="signIn()" class='signIn' >
			
			<h1 class='companyName'>Co-OwnMyPet.com</h1>
			<!--Need to format this better-->
			
		</div>
		
		<h2>Connecting Pet Owners & Pet Lovers!</h2>
		
		<div class='homepage_menu'>
			<ul>
				<li><a href=''>How It Works</a></li>
				<li><a href ='/createAccount'>Create An Account</a></li>
			</ul>
		</div>
		
		<!--from here down, it is the new slider. Remove this code to revert to old format-->
		<div class ="slider">
			<div class="slide-viewer">
				<div class="slide-group">
					<div class="slide slide-1">
						<img src='https://i.ytimg.com/vi/TyT4XIwT6lg/maxresdefault.jpg' />
					</div>
					<div class="slide slide-2">
						<img src="https://animalfair.com/wp-content/uploads/2013/04/cute-dog-grass-green-pug-Favim.com-331825.jpg" />
					</div>
					<div class="slide slide-3">		
						<img src="http://www.tehcute.com/pics/201110/marshmellow-kitten-big.jpg" />
					</div>
					<div class ="slide slide-4">
						<img src="https://henricohumane.org/wp-content/uploads/2016/03/shutterstock_352176329-1024x769.jpg" />
					</div>
				</div>
			</div>
			<div class="slide-buttons"></div>
		</div>
		<!--end slider-->				
		
		
		<!--<div id='homepageImage'>
			<img src='https://i.ytimg.com/vi/TyT4XIwT6lg/maxresdefault.jpg' />
		</div>-->
		
		<br>
		
		<p id='mailingList'>Interested in learning more about us? Sign up for our mailing list!</p>
		
		<form id='landingPage' method="post" action="?">
			First Name:<br>
			<input type ="text" name="firstname" />
			<br>
			Last Name:<br>
			<input type="text" name="lastname" />
			<br>
			Email Address:<br>
			<input type="text" name="emailaddress" />
			<br>
			<input type="submit">
		</form>
		
		<!--<p style="text-align: center">
			<button type ="button" onclick="formChanged()"> Submit </button>
		</p> -->
		
		<p style="font-size: 20px; text-align:center;"> 
			<?php echo $output; ?>
		</p>
		
		<p style="font-size: 20px; text-align:center;"> 
		We will contact you shortly. 
		</p>
		
		
		<br>
		
		<div class='bottom_bar'> 
			<h3>Other Options</h3>
			<ul>
				<li>About Us </li>
				<li>Testimonials</li>
				<li>Careers </li>
				<li>Terms of Service</li>
				<li>Contact </li>
				<!-- Any other items we can think of -->
			</ul>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script src="/scripts.js"> </script>
		
	</body>
</html>