<?php

if (strnatcmp(phpversion(),'5.0.0') < 0) { die("Error: this library requires PHP 5.0 or higher."); }

session_start();

require_once("./PostLinks_API.php");

$pl = new PostLinks_API();	

if ($pl->AuthenticateRestore($_SESSION['pl_auth_key']) || $pl->Authenticate('whitelist', 'Z9kRye5jWz87KH')) 
{
	// Save current auth_key
	$_SESSION['pl_auth_key'] = $pl->GetAuthKey();

	// 1. Get categories
	$categories = $pl->GetCategories();
	if (!$categories || ($err = $pl->GetErrors()))
	{
		die("Error: " . $err);
	}
	
	// make new profile categories
	$newcat = array();
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	
	// 2. Create new article profile 
	$ap_inserted_id = $pl->ArticleProfile_Create('Profile created through SOAP API on ' . date("Y-m-d"), $newcat);
	if (!$ap_inserted_id || ($err = $pl->GetErrors()))
	{
		die("Article profile is not created: " . $err);
	}
	
	// 3. Get article profiles
	$profiles = $pl->GetArticleProfiles();
	if (!$profiles || ($err = $pl->GetErrors()))
	{
		die("Error getting profiles: " . $err);
	}
	
	// Get random profile
	$prof = $profiles[rand(0,count($profiles)-1)];

	// make new categories
	$newcat = array();
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	$newcat[] = $categories[rand(0,count($categories)-1)]['category_id'];
	
	// 4. Modify profile
	$res = $pl->ArticleProfile_Edit($prof['profile_id'], $prof['profile_title'] . ' edited at '.date("Y-m-d H:i:s"), $newcat);
	if ($res)
	{
		echo "Profile {$prof['profile_id']} is updated successfully\n";
	}
	else
	{
		die("Profile is not updated: " . $pl->GetErrors());
	}	

	// 5. Create new article 
	//$a_inserted_id = $pl->Article_Create($prof['profile_id'], 'SOAP title created at ' . date("Y-m-d H:i:s"), str_repeat('Many many words here' . date("Y-m-d H:i:s") . '. ', 70), 'my note #' .rand());
	if ($ap_inserted_id)
	{
		echo "Article is created successfully in profile ".$prof['profile_id'].". New article_id=" . $ap_inserted_id."\n";
	}
	else
	{
		die("Article is not created: " . $pl->GetErrors());
	}
}
else
{
	echo $pl->GetErrors()."\n";
}
/* the end of file */