<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>List of Emails</title>
	</head>
	<body>
		<p><a href="?addEmail">Add your own email</a></p>
		<!--The value I used for the href query string is the name of the string variable
		Because the a new path is not specified in the href value, it automatically resubmits
		to the same directory, just like when it equals "", but this time it resubmits with
		the query string, which gets stored in the $_GET array that is automatically created
		once the browser requests the page from the server-->
		<p>Here are all the emails in the database:</p>
		<?php foreach ($emails as $email): ?>
			<blockquote>
			<!--What does blockquote do?-->
				<p>
					<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
				</p>
			</blockquote>
		<?php endforeach; ?>
	</body>
</html>