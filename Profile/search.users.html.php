<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/specialchars.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
		<link href=' http://fonts.googleapis.com/css?family=Spectral+SC' rel='stylesheet' type='text/css'>
		<title>User Search</title>
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
				<a href='http://www.co-ownmypet.com/'>Co-OwnMyPet.com</a>
			</h1>
			<!--Need to format this better-->
		</div>
		
		<div class='search'>
			<h1 >User Search</h1>
			<form action="" method="get" >
				<p margin="auto">Search for user contact information. <br>Start Sharing Pets Today!</p>
				<div class='searchdiv'>
					<label for="account">By Account Type:</label>
					<select name="account">
						<option value="">Both</option>
						<option value="primary">Primary Owners</option>
						<option value="secondary">Secondary Owners</option>
					</select>
				</div>
				<div>
					<input type="hidden" name="action" value="search">
					<input type="submit" value="Search">
				</div>
			</form>
			<p><a href="/profile">Return to Profile Page</a></p>
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
		
	</body>
</html>