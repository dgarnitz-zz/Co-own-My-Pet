<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Add Email</title>
	</head>
	<body>
		<form id='landingPage' method="post" action="?">
			<!--Changing the action attribute's value to "?" strips the query string(s)
			off the URL when submitting form. Now when the form submits, the request (http request?)
			include variables named after the <inputs> that contain their values. 
			These variables are then appear in the $_Post array-->
			
			<!--you can use the <label> & </label> tags if you wish to format input labels-->
			
			<!--First Name:<br>
			<input type ="text" name="firstname" />
			<br>
			Last Name:<br>
			<input type="text" name="lastname" />
			<br>-->
			Email Address:<br>
			<input type="text" name="emailaddress" />
			<br>
			<input type="submit">
		</form>
	</body>
</html>