<?php include('../load.php');?>
<?php
ob_start();
session_start();
$email=$_SESSION['email'];
date_default_timezone_set('Australia/Melbourne');
$date = date('Y-m-d h:i:s', time());
$users=$posts->update("users","email='$email'",'last_login',$date);
session_destroy();
if($users=='true'){header("location:index");}
?>