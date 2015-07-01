<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">
<div class="row box"> 
    
    <div class="col-md-4">	
    <div class="box-header with-border">
    <h3 class="box-title">
      Manage Articles For 'backlinks' Profile
   </h3>
    </div><!-- /.box-header -->
    </div>

    <div class="col-md-6 ">	
    <form role="form" method="post">
    <div class="col-md-6 box-header" >	
    <div class="input-group">
    <input type="text" name='q' class="form-control">
    <span class="input-group-btn">
    <button class="btn btn-info btn-flat" type="button">Go!</button>
    </span>
    </div>
    </div>
    <div class="col-md-6 box-header">	
    <select class="form-control plist" name="limit">
     <option value="">Sort Profiles By</option>
       <option value="dateadded">Date added</option>
       <option value="title">Profile Title</option>
       <option value="articles">Number of Articles</option>
       <option value="posts">Existing posts</option>
       <option value="qposts">Queued posts</option>
       <option value="waitinventory">Waiting on inventory</option>
        <option value="needcredits">Needing More Credits</option>
        <option value="limitmaxbudget">Max Budget Reached</option> 
    </select>
    </div>
<div class="col-md-6 box-header" >	
    <select class="form-control plist" name="limit">
    <option value="">All project folders</option>
    <option value="0">Unassigned</option>
  </select>
    </div>
    <div class="col-md-6 box-header">	
    <select class="form-control plist" name="limit">
     <option value="">Display per page</option>
       <option value="10">10 profiles per page</option>
       <option selected="" value="20">20 profiles per page</option>
       <option value="50">50 profiles per page</option>
       <option value="100">100 profiles per page</option>
  </select>
    </div>
  </form>
 </div>
  <div class="col-md-2 ">
  	<div class="box-tools pull-right">
    <a href=""><span class="label label-primary">Project Folder Help</span></a>
    </div><!-- /.box-tools -->
    </div>
 </div>
 
 <?php 
 $user_id=$_SESSION['user_id'];
 $profile_id=base64_decode($_GET['profile_id']);

 $articles=$posts->select('articals',"user_id='$user_id' and profile_id='$profile_id'",'*','user_id'); 
  if(empty($articles)):
  require('../api/postlinks_api/GetArticle.php');

 foreach ($result as $pros):
  $keys=array_keys($pros);
  array_push($keys,"profile_id");
  array_push($keys,"user_id");
  $value=array_values($pros);
  array_push($value,$profile_id);
  array_push($value,$user_id);
 foreach ($value as $key => $value) {
   $values[]="'".str_replace("'","~",$value)."'";
   }

$insert_id[]=$posts->insert('articals',$keys,$values);
unset($values) ;
unset($keys) ;

endforeach;

 elseif(empty($insert_id)):
  ?>  
<?php
endif;
?>
<?php 
if(isset($_POST['q'])):
$q=$_POST['q'];
$articles=$posts->select('articals',"user_id='$user_id' and profile_title like'%$q%'",'*','user_id'); 
elseif(isset($_GET['plist'])):
 $limit=$_GET['plist'];
$articles=$posts->select('articals',"user_id='$user_id' and profile_id='$profile_id'",'*','user_id',$limit); 
else:  
$articles=$posts->select('articals',"user_id='$user_id' and profile_id='$profile_id'",'*','user_id'); 
endif; 
foreach ($articles as $key => $value):
?> 
<!-- list of the all articles-->
<div class="row box box box-primary">
<div class="col-md-12"> 
<h4><?php echo $posts->excerpt($value['article_title'],260);?></h4>
<h5><?php echo $value['article_note'];?></h5>
</div>
<div class="col-md-12"> 
<p></p>
</div>
<div class="col-md-12"> 
<p><?php echo $posts->excerpt($value['article_text'],460);?></p>
</div>
<div class="col-md-12">  
<a href="Write-Article?profile_id=<?php echo base64_encode($value['profile_id']);?>&folder_id=<?php echo base64_encode($value['folder_id']);?>&&article_id=<?php echo base64_encode($value['article_id']);?>" /><button class="btn  btn-default btn-large">Edit Article</button></a>
<a href="Post-Articles?article_id=<?php echo base64_encode($value['article_id']);?>&profile_id=<?php echo base64_encode($value['profile_id']);?>"><button class="btn  btn-default btn-large">Post Article</button></a>
</div>
</div>    
<!--   end of listing of the articles -->
<?php endforeach;?>



















   
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include('footer.php');?>
