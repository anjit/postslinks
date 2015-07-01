<?php
ob_start();
include('../load.php');
include('../check.php');
session_start();
print_r($_GET);
print_r($_SESSION);

$posts->insert('orders','')

?>