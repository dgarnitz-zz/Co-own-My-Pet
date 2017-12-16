<?php

include $_SERVER['DOCUMENT_ROOT'] . '/magicquotes.inc.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/specialchars.inc.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/useraccess.inc.php';

if (!userIsLoggedIn())
{
	include 'signIn.html.php';
	exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/connection.include.php';

//process the search function
if (isset($_GET['search']))
{
	include 'search.users.html.php';
	exit();
}

//Load Profile
if (isset($_POST['action']) and $_POST['action'] == 'View profile')
{
	try
	{
		$sql = 'SELECT accountType, firstName, lastName, emailAddress FROM userAccounts WHERE ID = :ID';
		$s = $pdo->prepare($sql);
		$s->bindValue(':ID', $_POST['ID']);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error loading account information.';
		include 'error.php';
		exit();
	}
	
	$result = $s->fetch();

	$first = $result['firstName'];
	$last = $result['lastName'];
	$email = $result['emailAddress'];
	$account = $result['accountType'];
	
	include 'other.profile.html.php';
	exit();
}

//process the search function
if (isset($_GET['action']) and $_GET['action'] == 'search')
{
	$select = 'SELECT accountType, firstName, lastName, emailAddress, ID';
	$from = ' FROM userAccounts';
	$where = ' WHERE TRUE';
	
	$placeholders = array();
	
	if ($_GET['account'] == 'primary')  
	{
		$where .= " AND accountType = :account";
		$placeholders[':account'] = 'primaryOwner';
	}
	if ($_GET['account'] == 'secondary')  
	{
		$where .= " AND accountType = :account";
		$placeholders[':account'] = 'secondaryOwner';
	}
	
	//ADD OTHER SEARCH CATEGORIES LATER
	//add in SORTING
	
	try
	{
		$sql = $select . $from . $where;
		$s = $pdo->prepare($sql);
		$s->execute($placeholders);
	}
	catch (PDOException $e)
	{
		$error = 'Error fetching jokes';
		include 'error.php';
		exit();
	}
	
	foreach($s as $row)
	{
		$accounts[] = array('accountType' => $row['accountType'], 'firstName' => $row['firstName'], 'lastName' => $row['lastName'], 'emailAddress' => $row['emailAddress'], 'ID' => $row['ID']);
	}
	
	include 'results.search.html.php';
	exit();
}


//query to load profile information
try
{
	$sql = 'SELECT accountType, firstName, lastName, emailAddress FROM userAccounts WHERE emailAddress = :email';
	$s = $pdo->prepare($sql);
	$s->bindValue(':email', $_SESSION['email']);
	$s->execute();
}
catch (PDOException $e)
{
	$error = 'Error loading account information.';
	include 'error.php';
	exit();
}

//fetch() fetches ONE ROW from a result set associated with a PDOStatement object
$result = $s->fetch();

$first = $result['firstName'];
$email = $result['emailAddress'];
$account = $result['accountType'];
		
include 'profile.html.php'; 

?>