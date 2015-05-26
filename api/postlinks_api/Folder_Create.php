<?php
ob_start();
header("location:$_SERVER[REQUEST_URI]");
if (strnatcmp(phpversion(),'5.0.0') < 0) { die("Error: this library requires PHP 5.0 or higher."); }
session_start();
$_SESSION['p_user']='whitelist';
$_SESSION['p_pass']='Z9kRye5jWz87KH';
$project_folder =$_POST['project_folder'];
require_once("./PostLinks_API.php");

$pl = new PostLinks_API();

if ($pl->AuthenticateRestore($_SESSION['pl_auth_key']) || $pl->Authenticate($_SESSION['p_user'],$_SESSION['p_pass']))
{
	// Save current auth_key
	$_SESSION['pl_auth_key'] = $pl->GetAuthKey();

	// 
	$result = $pl->Folder_Create($project_folder);
	if ($pl->GetErrors() || !$result)
	{
		die("Error (Folder_Create): " . $pl->GetErrors());
	}
	
	echo "<pre>" , print_r($result, true) , "</pre>";
	header("location:$_SERVER[REQUEST_URI]");
}
else
{
	echo $pl->GetErrors()."\n";	
}
/* the end of file */