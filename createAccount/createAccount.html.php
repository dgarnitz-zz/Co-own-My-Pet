<!DOCTYPE html>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
		<link href="https://fonts.googleapis.com/css?family=Spectral+SC" rel="stylesheet">
		<meta charset = "utf-8">
		<title> Co-Own My Pet - Create An Account </title>
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
		
			<h1 class='companyName'>
				<a href='/'>Co-OwnMyPet.com</a>
			</h1>
			<!--Need to format this better-->
		</div>
		
		<div id='accountCreationToggle'>
			<h4>
				<span id='acPrimary'>Primary Owner </span>
				<span id='acSecondary'>Secondary Owner</span>
			</h4>
			<p id='acToggleText'>
				Are you having trouble with the time and financial commitments of 
				<br>
				pet ownership?
				<br>
				<br>
				Are you interested in sharing your pet with someone who will love 
				<br>
				it as much as you do?
				<br>
				<br>
				Sign up today as a primary owner and search for the perfect partner 
				<br>
				to share your pet with!
			</p>
			<!--How do you make text wrap using CSS?-->
		</div>
		
		<p style="font-size: 20px; text-align:center;"> 
			<?php echo $error; ?>
		</p>
		
		<div id='accountCreationForm'>
			<form id='accountSignUpForm' method='post' action='?'>
				Account Type:
				<select name="accountType">
					<option value = "chooseOption">--Choose Option--</option>
					<option value="primaryOwner">Primary Owner</option>
					<option value="secondaryOwner">Secondary Owner</option>
				</select><br>
				<br>
				First Name:<br>
				<input type='text' name='newFirstName'/>
				<br>
				Last Name:<br>
				<input type='text' name='newLastName'/>
				<br>
				Email:<br>
				<input type='email' name='newUserEmail'/>
				<!--using type 'email' instead of text'-->
				<br>
				Create Password:<br>
				<input type='password' name='newAccountPassword'/>
				<br>
				<!--Need description of the rules for passwords-->
				<p style="font-size:12px">Passwords must be between 8 and 16 letters
				<br>and must have at least one capital letter
				<br>and one number.
				</p>
				Confirm Password:<br>
				<input type='password' name='newAccountConfirmPassword'/>
				<br>
				<br>
				<input type ="submit" id='signUpButton'>
				<!--I want this button to read "Sign Up" not "Submit"-->
			</form>
			
			<p style="margin: 0 0 0 0">By click Sign Up, you agree to our<br> 
				<a href=''>Terms & Conditions.</a>
			</p>
		</div>
		
		<br>
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