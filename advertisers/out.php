<?php
ob_start();
session_start();
include('../load.php');
//echo "** Post Array **\n";
print_r($_POST);
$user_id=$_SESSION['user_id'];
//echo "** Files Array **\n";
print_r($_FILES);

//echo "** Image **\n";
foreach($_FILES as $file) {
	$imgData = base64_encode(file_get_contents($file['tmp_name']));
	$src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
	echo '<img src="'.$src.'"><br>';
	$posts->update('users',"user_id=$user_id",'image',$src);
	unset($_SESSION['user_img']);
	$_SESSION['user_img']=$src;
}

?>