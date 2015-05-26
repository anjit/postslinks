<?php

if (strnatcmp(phpversion(),'5.0.0') < 0) { die("Error: this library requires PHP 5.0 or higher."); }

session_start();

require_once("./PostLinks_API.php");

$pl = new PostLinks_API();	

if ($pl->AuthenticateRestore($_SESSION['pl_auth_key']) || $pl->Authenticate('postlinks_username', 'postlinks_password')) 
{
	// Save current auth_key
	$_SESSION['pl_auth_key'] = $pl->GetAuthKey();

	// 1. example
	$resdel = $pl->CommentLink_Delete(13);
	if ($resdel)
	{	
		echo "delete successfully";
	}
	else
	{
		die("Error delete links: " . $pl->GetErrors());
	}
	print_r($resdel);
	
	// 2. example
	$resdel = $pl->ContextualLink_Delete(50);
	if ($resdel)
	{	
		echo "delete successfully";
	}
	else
	{
		die("Error delete links: " . $pl->GetErrors());
	}
	print_r($resdel);
	
	// 3.  example
	$commentlinks = $pl->GetCommentLinks(9);
	if (!$commentlinks || ($err = $pl->GetErrors()))
	{
		die("Error getting comment links: " . $err);
	}
	print_r($commentlinks);
	
	// 4.  example
	$contextlinks = $pl->GetContextualLinks(9);
	if (!$contextlinks || ($err = $pl->GetErrors()))
	{
		die("Error getting contextlinks : " . $err);
	}
	print_r($contextlinks);


 	// 5.  example
	$cql_inserted_id = $pl->Context_QueueLinks(9, 'link_anchor_text', 'instant', 45, 2, 5, 4);
	if (($err = $pl->GetErrors()) || !$cql_inserted_id)
	{
		die("Error while adding Context Queue Links: " . $err);
	}
	print_r($cql_inserted_id);
	
	// 6.  example
	$cql_inserted_id = $pl->Comment_QueueLinks(9, 'link_anchor_text', 'tou', 'daily', 45, 2, 5, 4);
	if (($err = $pl->GetErrors()) || !$cql_inserted_id)
	{
		die("Error while adding Context Queue Links: " . $err);
	}
	print_r($cql_inserted_id);

	// 7.  example
	$cql_inserted_id = $pl->QueuedLinks_Delete(18);
	if (($err = $pl->GetErrors()) || !$cql_inserted_id)
	{
		die("Error while adding Context Queue Links: " . $err);
	}
	print_r($cql_inserted_id);	
	
 	// 8.  example
	$ff = $pl->__getFunctions();
	print_r($ff);
	
}
else
{
	echo $pl->GetErrors()."\n";	
}
/* the end of file */