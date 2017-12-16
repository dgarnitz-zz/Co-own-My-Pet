<?php

include $_SERVER['DOCUMENT_ROOT'] . '/magicquotes.inc.php';

session_start();

//in an ideal situation this would reload with an error message if any ofthe inputs were empty
if (!isset($_POST['emailaddress'])) 
{
	include 'homepage.html.php';
	exit();
}

//Must establish connection before any queries can be run
//Makes sense to test the connection first before looking at the input values
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=CoOwnMyPetDataBase', 'dgarnitz', 'username123');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	$error = 'Unable to connect to the database server';
	include 'connectError.html.php';
	//at some point, you will need to remove this addition file and handle errors smoother!!!
	exit();
}

//prepared statement
//Used not-empty() instead of isset() because the query creates a string variable for 
//each input once the <form> is submitted
if ((!empty($_POST['firstname']) and !empty($_POST['lastname']) and !empty($_POST['emailaddress'])))
{
	//VALUE check to prevent BS user entries
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$emailaddress = $_POST['emailaddress'];
	
	//This function will probably be used more than once so it may need to be moved
	function validateEmail($validemail)
	{
		return filter_var($validemail, FILTER_VALIDATE_EMAIL);
		//filter_var filters a variable with a specified filter
		//in this case the specified filter is PHP FILTER_VALIDATE_EMAIL
	}
	
	//This will probably be used more than once so it may need to be moved
	if(!ctype_alnum($firstname) or !ctype_alnum($lastname))
	{
		$output = 'Please only use alphanumeric characters when filling your name.';
		include 'homepage.html.php';
		exit();
		//The problem with this is what happens when people have funky names???
	}
	
	if(!validateEmail($emailaddress))
	{
		$output = 'Please enter a valid email address.';
		include 'homepage.html.php';
		exit();
	}
	
		try
		{
			$sql = 'INSERT INTO InterestedUsers SET 
			firstname = :firstname, lastname = :lastname, emailaddress = :emailaddress';
			//this sets each column value equal to that of a placeholder
			$s = $pdo->prepare($sql);
			//??? Is this the same PDO as before? If so, how do we access it outside the try scope?
			//This returns a PDOStatement object, same kind as a SELECT query
			$s->bindValue(':firstname', $_POST['firstname']);
			$s->bindValue(':lastname', $_POST['lastname']);
			$s->bindValue(':emailaddress', $_POST['emailaddress']);
			$s->execute();
		}
		catch (PDOException $e)
		{
			$error = 'Error submitting information';
			include 'connectError.html.php';
			exit();
		}
		
		$output = "Thank you for your interest, " . $firstname . "!";
}
else
{
	$output = 'Please fill in all boxes.';
	include 'homepage.html.php';
	exit();
}

include 'homepage.html.php';

?>



