<?php

include $_SERVER['DOCUMENT_ROOT'] . '/magicquotes.inc.php';

session_start();

//I know there is a better way to write this mechanism for displaying the form at first
//But I'm not exactly sure what that is
if(!isset($_POST['newUserEmail']))
{
	include 'createAccount.html.php';
	exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/connection.include.php';

//Validation functions

//at some point you should move the validation functions to a separate file
if(empty($_POST['newFirstName']) or empty($_POST['newLastName']) or
	empty($_POST['newUserEmail']) or empty($_POST['newAccountPassword'])
	or empty($_POST['newAccountConfirmPassword']))
{
	$error = "Please fill in all the boxes";
	include 'createAccount.html.php';
	exit();
}

if($_POST['accountType'] == "chooseOption")
{
	$error = "Please choose an account type";
	include 'createAccount.html.php';
	exit();
}

$accountType = $_POST['accountType'];
$newFirstName = $_POST['newFirstName'];
$newLastName = $_POST['newLastName'];
$newUserEmail = $_POST['newUserEmail'];
$newAccountPassword = $_POST['newAccountPassword'];
$newAccountConfirmPassword = $_POST['newAccountConfirmPassword'];


try
{
	$sql = "SELECT emailAddress FROM userAccounts WHERE emailAddress = :emailAddress";
	$s = $pdo->prepare($sql);
	//do the query method and the prepare method return the same type??? 
	$s->bindValue(':emailAddress', $newUserEmail);  
	$s->execute();	 
}
catch (PDOException $e)
{
	$error = 'Error submitting information';
	include 'createAccount.html.php';
	exit();
}

foreach ($s as $row)
{
	$emails[] = $row['emailAddress'];
}

if($emails[0]==$newUserEmail)
{
	$error = "An account with that email address already exists exist.";
	include 'createAccount.html.php';
	exit();
}


//Make sure passwords match
if($newAccountPassword != $newAccountConfirmPassword)
{
	$error = "Passwords do not match";
	include 'createAccount.html.php';
	exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/createAccount/createAccount.validation.php';

//call password validation function
if (validPassword($newAccountPassword) == false)
{
	$error = "Password did not meet the proper criteria listed below.";
	include 'createAccount.html.php';
	exit();
}

//Alter password before storing it
$newAccountPassword = md5($newAccountPassword . 'copdb'); 

//Insert new account information into the database
try
{
	$sqltwo = 'INSERT INTO userAccounts SET 
	accountType = :accountType, firstName = :firstname, lastName = :lastname, 
	emailAddress = :emailaddress, passWord = :password';
	$stwo = $pdo->prepare($sqltwo);
	$stwo->bindValue(':accountType', $accountType);
	$stwo->bindValue(':firstname', $newFirstName);
	$stwo->bindValue(':lastname', $newLastName);
	$stwo->bindValue(':emailaddress', $newUserEmail);
	$stwo->bindValue(':password', $newAccountPassword);
	$stwo->execute();
}
catch (PDOException $e)
{
	$error = 'Error submitting information';
	include 'createAccount.html.php';
	exit();
}

$error = "Account successfully created";
include 'createAccount.html.php';
exit();


//REDIRECT TO PROFILE
//header('Location: .');
//exit();


?>