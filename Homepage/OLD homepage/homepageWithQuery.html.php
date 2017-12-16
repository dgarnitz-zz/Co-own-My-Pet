<!DOCTYPE html>
<html>
	<head>
	<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
	<meta charset="utf-8">
		<title> Co-Own My Pet </title>
	</head>

	<body>
		<div class='homepage_top'>
		
			<input type='button' value='Account Sign-In' style='float: right;' onclick="signIn()" class='signIn' />
			<!--this button did not work once I created the /welcome directory because
			src in the <script> tag did not use a server-relatie format for the path,
			which originally was not necessary since they were all in the public directory
			but now that I have new directories it has to be adjusted-->
			
			<h1 class='companyName'>Co-OwnMyPet.com</h1>
			<!--Need to format this better-->
			
		</div>
		
		<h2>Connecting Pet Owners & Pet Lovers!</h2>
		
		<div class='homepage_menu'>
			<ul>
				<li><a href=''>How It Works</a></li>
				<li><a href ='http://www.co-ownmypet.com/createAccount.html'>Create An Account</a></li>
			</ul>
		</div>
		
		<div id='homepageImage'>
			<img src='https://i.ytimg.com/vi/TyT4XIwT6lg/maxresdefault.jpg' />
		</div>
		
		<br>
		
		<p id='mailingList'>Interested in learning more about us? Sign up for our mailing list</p>
		
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
		Thank you! We will contact you shortly. 
		</p>
		
		<p style="font-size: 20px; text-align:center;"> 
			<?php echo $output; ?>
		</p>
		
		
		<p style="font-size: 20px; text-align:center;">
			Here is all the information in the database:
		</p>		
		<?php foreach ($interestedUsers as $interestedUser): ?>
			<blockquote>
				<p style="font-size: 20px; text-align:center;">
					<?php 
					echo htmlspecialchars($interestedUser, ENT_QUOTES, 'UTF-8'); 
					?>
				</p>
			</blockquote>
		<?php endforeach; ?> 
		
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