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

$result = $s->fetch();

$first = $result['firstName'];
$email = $result['emailAddress'];
		
include 'profile.html.php'; 

?>