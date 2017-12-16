<!DOCTYPE html>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
		<link href=' http://fonts.googleapis.com/css?family=Spectral+SC' rel='stylesheet' type='text/css'>
		<title> Co-Own My Pet - Profile </title>
	</head>
	
	<!--NOTE in order to change the URL of this page & move it to its own directory
	a PHP controller file must be developed & uploaded-->
	
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
				<a href='http://www.co-ownmypet.com/'>Co-OwnMyPet.com</a>
			</h1>
			<!--Need to format this better-->
		</div>
		
		<div class='profilePage'>
			
			<h1>Profile Page</h1>
			
			<p>This is the profile of: <?php echo $first . " " . $last; ?>!</p>
			
			<p>Please use this email: <?php echo $email; ?>
			<br>to communicate with <?php echo $first; ?></p>
			
			<!--FORMAT this hyperlink -->
			<p><a href="?search">Search for <?php if($account == 'primaryOwner'){
														echo 'secondary owners';
														}
														else {
														echo 'primary owners';
														} ?> </a></p>
			
			<br>
			<?php include '../logout.inc.html.php'; ?>
			
		
		</div>
		
		
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