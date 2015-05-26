<?php

if (strnatcmp(phpversion(),'5.0.0') < 0) { die("Error: this library requires PHP 5.0 or higher."); }

$project_folder =$_POST['project_folder'];
$profile_id =$_POST['profile_id'];
$title =$_POST['title'];
$Notes =$_POST['Notes'];
$description =$_POST['description'];
$user_id=$_SESSION['user_id'];
include('../../load.php');
require_once("./PostLinks_API.php");

$pl = new PostLinks_API();

if ($pl->AuthenticateRestore($_SESSION['pl_auth_key']) || $pl->Authenticate('postlinks_username', 'postlinks_password'))
{
	// Save current auth_key
	$_SESSION['pl_auth_key'] = $pl->GetAuthKey();

	
	// 
	$result = $pl->Article_Create($profile_id,$title,$description,$Notes, true);
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