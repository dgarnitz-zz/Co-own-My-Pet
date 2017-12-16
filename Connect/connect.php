<?php
//this file should be the index file, change name after uploading it to Cpannel
//it is important to note that if the directory has no default (an index)
//the server will not allow access

//remove Magic Quotes
//At some point, link this in from a separate file !!!
if (get_magic_quotes_gpc())
{
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	
	while (list($key, $val) = each($process))
	{
		foreach ($val as $k => $v)
		{
			unset($process[$key][$k]);
			if (is_array($v))
			{
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			}
			else
			{
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}

if (isset($_GET['addEmail']))
//on the Output page, the first page that loads, the hyperlink's (<a> tag) href is set equal
//to a query string called addEmail. isset() checks to see if the associative array
//$_GET[] has a value associated with the key 'addEmail', which it will if the user clicks 
//on the hyperlink. In this case, isset() returns a value and the if statement is TRUE,
//causing the controller to include the form page & redirect the user there
{
	include 'connectForm.html.php';
	exit();
}

//Must establish connection before any queries can be run
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=CoOwnMyPetDataBase', 'dgarnitz', 'username123');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
//this not only catches the PDOException object, it stores it in a variables called $e
{
	$error = 'Unable to connect to the database server: ' . $e->getMessage();
	//this calls the PDOException objects getMessage method
	//use this message to output errors during develop
	//DELETE when code goes live, as it will confuse the user
	include 'connectError.html.php';
	exit();
}

//After connection is established, put the prepared statement
//When the user hits submit on the form and this executes, 
//it will be a new browser request, so the $_GET array will not have the 
//addEmail index initialized yet
if (isset($_POST['emailaddress']))
{
	try
	{
		$sql = 'INSERT INTO InterestedUsers SET emailaddress = :emailaddress';
		//this sets the emailaddress column value equal to a placeholder called emailaddress
		//deal with first name and last name later, once this works !!!
		$s = $pdo->prepare($sql);
		//??? Is this the same PDO as before? If so, how do we access it outside the try scope?
		//This returns a PDOStatement object, same kind as a SELECT query
		$s->bindValue(':emailaddress', $_POST['emailaddress']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error adding submitted joke: ' . $e->getMessage();
		include 'connectError.html.php';
		exit();
	}
	
	//This makes it redirect to itself
	//Necessary to prevent the browser from resubmitting the form and adding info to the DB twice
	header('Location: .');
	exit();
}


try
{
	$sql = 'SELECT emailaddress FROM InterestedUsers';
	//CHECK THIS
	$result = $pdo->query($sql);
	//This returns a PDO Statement object, which has an associated result set
	//^WHAT DOES THAT MEAN???
}
catch (PDOException $e)
{
	$error = 'Error fetching emails: ' . $e->getMessage();
	include 'connectError.html.php';
	exit();
}

//while ($row = $result->fetch())
//{
	//$emails[] = $row['emailaddress'];
	
	//if $row is a row in our result set, $row['emailaddress'] is the value of the email
	//address column of that row
	//The array $emails[] does not have explicitly set keys, so PHP gives them default keys
	//starting with 0 and going up. All arrays in PHP have keys
	//The above written code takes the email address associated with each row's email column
	//and sets it equal to the next element in the array
	//I assume when the code runs, it automatically moves the array to the next index???
//}

foreach ($result as $row)
{
	$emails[] = $row['emailaddress'];
}
//Alternative way to do what the while loop does
//I DO NOT understand how this works?????

include 'connectOutput.html.php';

?>