<?php
class database{

public function insert($table,$fields=null,$values=null){

//echo 'inserted';

 $sql ="insert into $table(".implode(",", array_map('trim', $fields)).") values (".implode(",", array_map('trim', $values)).")";
$results=mysql_query($sql) or die(mysql_error());
return mysql_insert_id();
}


public function delete($table,$condition=null){
//echo 'deleted';
$sql ="delete from $table where $condition";
$results=mysql_query($sql);
return $results;
}

public function update($table,$condition=null,$fields=null,$values=null){
//echo 'updated';
$sql ="update $table set $fields ='$values' where $condition";
mysql_query($sql);
return 'true';
}

public function select($table=null,$condition=null,$fields=null,$order=null,$limit=null){
//echo 'selected';
if($limit):
 $sql ="select $fields from $table where $condition order by $order DESC limit $limit";  
else:
 $sql ="select $fields from $table where $condition order by $order DESC";
endif;
$results=mysql_query($sql);
return database::get_results($results);
}

public function all($table=null,$fields=null,$limit=null,$order=null){
//echo 'selected all';
if($limit==''){ $sql ="select $fields from $table order by $order DESC";}
else{
$sql ="select $fields from $table order by $order DESC limit $limit";}
$results=mysql_query($sql);
return database::get_results($results);
}

/// get all resutls///
public function get_results($results){
$num= mysql_num_rows($results);	
if($num>0):
while ($rows =mysql_fetch_assoc($results)) {
$result_array[] =$rows;
}
// $opt= new database();
// foreach($result_array as $key => $value)
// {
// $opt->$key = $value;
// }

return $result_array;
endif;
}
/// get conditional results
public function get_result($results){
$num= mysql_num_rows($results);	
if($num>0):
$rows =mysql_fetch_assoc($results);
return $rows;
endif;
}
public function nav_menu($table=null,$condition,$type,$status=null) {
//get term id //
 $sql ="select id from variables where variable_name = '$condition'";
$menu_id=mysql_result(mysql_query($sql),0,'id') or die(mysql_error());
$sql ="select * from $table where post_type = '$menu_id' and post_category='$type' $status order by post_content ASC";
$results=mysql_query($sql);
return database::get_results($results);
}

public function row_num($results){
$num =sizeof($results);
return $num;
}

public function options($options=null,$fields=null){
$sql ="select $fields from posts where post_title like '$options'";
$results=mysql_query($sql);
return database::get_result($results);	
}

public function get_field($table=null,$condition=null,$field=null){
$sql ="select $field from $table where $condition";
$results=mysql_result(mysql_query($sql),0,$field);
return $results;  
}

public function get_metas($id){
$sql ="select * from meta where post_id ='$id'";
$results=mysql_query($sql);
return database::get_results($results);		
}

public function get_meta($id,$field=null,$type=null){
if($field=='')
 {
  $sql ="select * from meta where post_id ='$id' order by id DESC";
}
else{
 $sql ="select $field from meta where post_id ='$id' and type='$type' order by id DESC"; 
}
$results=mysql_query($sql);
return database::get_result($results);		
}

public function has_child($id){
$sql ="select * from posts where post_parent ='$id'";
$results=mysql_query($sql);
return database::get_results($results);		
}

public function has_parent($id){
$sql ="select post_parent from posts where id ='$id'";
$results=mysql_query($sql);
return database::get_result($results);		
}

public function  get_pages(){
$sql ="select * from posts where post_type ='4'";
$results=mysql_query($sql);
return database::get_results($results);		
}

public function redirect($url){
 echo "<Script>$(document).ready(function() {window.open('$url','_self');});</script>";
}




public function image_upload(){
$target_dir = "uploads/";


$ext = pathinfo($_FILES["url"]["name"], PATHINFO_EXTENSION);
$target_file = $target_dir . basename($_FILES["url"]["name"]);
$target_url = "uploads/" . basename($_FILES["url"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["url"]["tmp_name"]);
  if($check !== false) {
  //echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
  } 
  else {
   //echo "File is not an image.";
  $uploadOk = 0;
   }
}
// Check if file already exists
/*if (file_exists($target_file)) {
//echo "Sorry, file already exists.";
$uploadOk = 0;
}*/
// Check file size
// if ($_FILES["url"]["size"] > 5000000) {
//  echo "Sorry, your file is too large.";
//    $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
 if (move_uploaded_file($_FILES["url"]["tmp_name"], $target_file)) {
 // echo "The file ". basename( $_FILES["url"]["name"]). " has been uploaded.";
    } else {
  //  echo "Sorry, there was an error uploading your file.";
  }
}

return $target_url;
}



public function excerpt($content=null,$width=null,$etc=null){
$wrapped = explode('$trun$', wordwrap($content, $width, '$trun$', false), 2);
 return $wrapped[0] . (isset($wrapped[1]) ? $etc : '');
} 



public function file_upload(){
$target_dir = "uploads/documents/";

if(basename($_FILES["url"]["type"])=='msword'){
$target_file = $target_dir .$_POST['doc_id'].".doc";
$target_url = "uploads/documents/".$_POST['doc_id'].".doc";


//echo 'msword';
}
elseif(basename($_FILES["url"]["type"])=='vnd.openxmlformats-officedocument.wordprocessingml.document'){ 
  $target_file = $target_dir .$_POST['doc_id'].".". basename($_FILES["url"]["type"]);
  $target_url = "uploads/documents/".$_POST['doc_id'].".docx";

}
else{ $target_file = $target_dir .$_POST['doc_id'].".". basename($_FILES["url"]["type"]);
$target_url = "uploads/documents/".$_POST['doc_id'].".". basename($_FILES["url"]["type"]);

}

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["url"]["tmp_name"]);
if($check !== false) {
// echo "File is an image - " . $check["mime"] . ".";
 $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
 $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["url"]["size"] > 5000000) {
 // echo "Sorry, your file is too large.";
 $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "pdf" && $imageFileType != "jpeg"
&& $imageFileType != "msword" ) {
 // echo "Sorry, only JPG, JPEG, doc & pdf files are allowed.";
 $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["url"]["tmp_name"],$target_file)) {
//  echo "The file ". basename( $_FILES["url"]["name"]). " has been uploaded.";
 } else {
 //  echo "Sorry, there was an error uploading your file.";
 }
}
return "http://".$_SERVER['HTTP_HOST'].'/'.$ppname.'/'.$pname.'/'.$target_url;
}



public function multi_file_upload(){

$valid_formats = array("jpg", "png", "gif", "zip", "bmp","doc","pdf","docx");

$max_file_size = 1024*10000; //100 kb

$target_dir = "uploads/documents/";
$target_url = "uploads/documents/";

$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files

  foreach ($_FILES['files']['name'] as $f => $name) {     

      if ($_FILES['files']['error'][$f] == 4) {

          continue; // Skip file if any error found

      } 

      if ($_FILES['files']['error'][$f] == 0) {            

          if ($_FILES['files']['size'][$f] > $max_file_size) {

              $message[] = "$name is too large!.";

              continue; // Skip large files

          }

      elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){

        $message[] = "$name is not a valid format";

        continue; // Skip invalid file formats

      }

          else{ // No error found! Move uploaded files 
				$name = rand(rand(1,100),rand(5,9)).'-'.$name;
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $target_dir.$name))

              $count++; // Number of successfully uploaded file

            $uploads[] .= $target_url.$name;
           
          }

      }

  }

}

return $uploads;
}

public function is_admin()
{
$user=$_SESSION['permission'];
if($user=='Admin'){
return true;
}
else{
return false;
}
}

public function  get_category(){

$sql ="select * from posts where post_type ='6'";
$results=mysql_query($sql);
return database::get_results($results);   
}

public function  select_post_by_cat($table=null,$condition=null,$cat=null){
 $sql ="select * from posts where $condition and post_category='$cat'";
$results=mysql_query($sql);
return database::get_results($results);   
}

public function filter_select($table=null,$condition=null,$filter=null,$order=null,$limit=null){
 
echo $sql ="create TEMPORARY TABLE IF NOT EXISTS table2 AS (SELECT * FROM $table where $condition);
           ALTER TABLE table2 DROP $filter;
          SELECT * FROM table2;" ;
$results=mysql_query($sql);
return database::get_results($results);
}
public function credit_used($pr,$post_count){
switch ($pr) {
    case 0:
        echo $post_count;
        break;
    case 1:
        echo $post_count;
        break;
    case 2:
        echo $post_count*5;
        break;
    case 3:
        echo $post_count*10;
        break;
     case 4:
        echo $post_count*20;
        break;
    case 5:
        echo $post_count*40;
        break;
       
    
    default:
        echo 0;
}

}



///end of code
}