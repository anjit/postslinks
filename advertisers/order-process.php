<?php
ob_start();
include('../load.php');
session_start();
$user_id =$_SESSION['user_id'];
//print_r($_SESSION);
//print_r($_GET);
$keys = array_keys($_GET);
$level=$_GET['item_number'];
$values = array_map(function($value) { return "'".$value."'"; },array_values($_GET));
array_push($keys,'user_id');
array_push($values,$user_id);
$posts->insert('orders',$keys,$values);
$credits=$posts->get_field('credits_records',"user_id='$user_id'",'credits');
$credit_value=$posts->get_field('member_plan',"id='$level'",'credits');
if($credits):
$posts->update('credits_records',"user_id='$user_id'",'credits',$credits+$credit_value);
else:
$posts->insert('credits_records',array('user_id','credits','level'),array("'$user_id'","'$credit_value'","'$level'"));	
endif;	
header('location:Profile');
?>