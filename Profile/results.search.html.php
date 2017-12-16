<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/specialchars.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link type='text/css' rel='stylesheet' href='http://www.co-ownmypet.com/stylesheet.css' />
		<link href=' http://fonts.googleapis.com/css?family=Spectral+SC' rel='stylesheet' type='text/css'>
		<title>User Search Results</title>
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
		<h1>Search Results</h1>
		<?php if (isset($accounts)): ?>
		<table>
			<tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>
			<?php foreach ($accounts as $account): ?>
			<tr valign="top">
				<td><?php markdownout($account['firstName']); ?></td>
				<td><?php markdownout($account['lastName']); ?></td>
				<td><?php markdownout($account['emailAddress']); ?></td>
				<td>
					<form action="" method="post">
						<div>
							<input type="hidden" name="ID" value="<?php htmlout($account['ID']); ?>" >
							<input type="submit" name="action" value="View profile">
						</div>
					</form>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>
		<p><a href="?search">New Search</a></p>
		<p><a href="/profile">Return to Profile Prage</a></p>
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