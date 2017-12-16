<?php 

//Check for valid password
function validPassword($validPassword){
	//check for the right length
	if(strlen($validPassword)>16 or strlen($validPassword)<8)
	{
		return false;
	}
	
	//check for a capital letter
	if(ctype_lower($validPassword))
	{
		return false;
	}
	
	//check for a number
	//found this online, not sure how it works
	//https://www.sitepoint.com/community/t/check-whether-string-contains-numbers/5953/2
	if(1 === preg_match('~[0-9]~', $validPassword))
	{
		return true;
	}
	else
	{
		return false;
	}	
}

?>

