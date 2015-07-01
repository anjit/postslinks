<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<style type="text/css">
.breadcrumb{
text-transform: capitalize;
}
.breadcrumb>.active {
  color: #777;
  font-weight: bold;
  text-transform: capitalize;
}
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
<?php 
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$ptitle=end($parts);
$pt= str_replace('-',' ',$ptitle);
$page_title= str_replace('.php','',$pt);
echo ucwords($page_title);
?>
</h1>
<ol class="breadcrumb">
<?php  
if($location = substr(dirname($_SERVER['PHP_SELF']), 1))
$dirlist = explode('/', $location);
else
$dirlist = array();

$count = array_push($dirlist, basename($_SERVER['PHP_SELF']));

$address = 'http://'.$_SERVER['HTTP_HOST'];

echo '<li><a href="index"><i class="fa fa-dashboard"></i><a href="'.$address.'">Home</a></li>';

for($i = 0; $i <$count; $i++){
if($i==$count-1){$class="class='active'";}
echo '<li '.$class.'><a href="'.($address .= '/'.$dirlist[$i]).'">'.str_replace('.php','',$dirlist[$i]).'</a></li>';
}
?>
</ol>
</section>

