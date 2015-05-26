<?php
ob_start();
session_start();
$uname=$_SESSION['name'];
$permission=$_SESSION['permission'];
if($_SESSION['email']=="")
{
echo "why you are doing this!";
header('location:login');
exit;
}
else
{
$login_mail=$_SESSION['email'];
}
