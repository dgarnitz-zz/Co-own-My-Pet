<?php 

function userIsLoggedIn()
{
	if (isset($_POST['action']) and $_POST['action'] == 'login')
	{
		if (!isset($_POST['email']) or $_POST['email'] == '' or !isset($_POST['password']) or $_POST['password'] == '')
		{
			$GLOBALS['loginError'] = 'Please fill in both fields';
			return FALSE;
		}
		
		$password = md5($_POST['password'] . 'copdb');
		
		if (databaseContainsAccount($_POST['email'], $password))
		{
			session_start();
			$_SESSION['loggedIn'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $password;
			return TRUE; 
		}
		else
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['email']);
			unset($_SESSION['password']);
			$GLOBALS['loginError'] = 'The specified email address or password was incorrect.';
			return FALSE;
		}	
	}
	
	//check if user has hit log out button, log them out and redirect
	if (isset($_POST['action']) and $_POST['action'] == 'logout')
	{
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('Location: ' . $_POST['goto']);
		exit();
	}
	
	//check if the user is already logged in
	//if the user changes their password while logged in and tries to reload a page
	//this function will query for the old password stored in $_SESSION['password'], which won't appear in the DB
	//since it has been changed. Thus the function will return FALSE and the user will be prompted to log in again
	session_start();
	if(isset($_SESSION['loggedIn']))
	{
		return databaseContainsAccount($_SESSION['email'], $_SESSION['password']);
	}
}

function databaseContainsAccount($email, $password)
{
	include $_SERVER['DOCUMENT_ROOT'] . '/connection.include.php';
			
	try
	{
		$sql = 'SELECT COUNT(*) FROM userAccounts WHERE emailAddress = :email AND passWord = :password';
		$s = $pdo->prepare($sql);
		$s->bindValue(':email', $email);
		$s->bindValue(':password', $password);
		$s->execute();
	}
	catch (PDOException $e)
	{
		$error = 'Error searching for account.';
		include 'error.php';
		exit();
	}
			
	$row = $s->fetch();
			
	if ($row[0] > 0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


?>