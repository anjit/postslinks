<?php

if (strnatcmp(phpversion(),'5.0.0') < 0) { die("Error: this library requires PHP 5.0 or higher."); }

session_start();

require_once("./PostLinks_API.php");

$pl = new PostLinks_API();	

if ($pl->AuthenticateRestore($_SESSION['pl_auth_key']) || $pl->Authenticate('postlinks_username', 'postlinks_password')) 
{
	// Save current auth_key
	$_SESSION['pl_auth_key'] = $pl->GetAuthKey();

	
	// 
	$result = $pl->Post_Delete(20636563, true, true);
	if ($pl->GetErrors() || !$result)
	{
		die("Error: " . $pl->GetErrors());
	}

	
	echo "<pre>" , print_r($result, true) , "</pre>";
}
else
{
	echo $pl->GetErrors()."\n";	
}
/* the end of file */