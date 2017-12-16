<!DOCTYPE html>
<html lang='en'>
<!--for some reason the browser thought this page was in norwegian-->
	<head>
		<meta charset='utf-8'>
		<title>List of Emails</title>
	</head>
	<body>
		<p><a href="/">Return Home</a></p>
		<p>Here is all the information in the database:</p>		
		<?php foreach ($interestedUsers as $interestedUser): ?>
			<blockquote>
				<p>
					<?php 
					echo htmlspecialchars($interestedUser, ENT_QUOTES, 'UTF-8'); 
					?>
				</p>
			</blockquote>
		<?php endforeach; ?>
	</body>
</html>

<!--It should be noted that this solution works but its messy
What I would like to know is how do I output the data as if its formatted in a table on
the webpage? 
Would I use JavaScript or jQuery to dynamically create a table based on
the # of rows & columns the query returns, or is there a simpler way?-->