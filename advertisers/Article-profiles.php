<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('bredcum.php');?>


<!-- Main content -->
<section class="content">
<div class="row box"> 
    
    <div class="col-md-4">	
    <div class="box-header with-border">
    <h3 class="box-title">
   <button class="btn btn-block btn-primary btn-mid" data-toggle="modal" data-target="#addmodel" data-title="Add Project"><i class="fa fa-plus"></i> Add Profile</button>
   <button class="btn btn-block btn-primary btn-mid" data-toggle="modal" data-target="#addmodel" data-title="Add Project"><i class="fa fa-plus"></i> Add Project Folder</button></h3>
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

 $projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id'); 
  if(empty($projects)):
  require('../api/postlinks_api/GetArticleProfiles.php');

 foreach ($result as $pros):
  $keys=array_keys($pros);
  array_push($keys,"addeddate");
  array_push($keys,"user_id");
  $value=array_values($pros);
  array_push($value,date('y-m-d H:i:s'));
  array_push($value,$user_id);
 foreach ($value as $key => $value) {
   $values[]="'".$value."'";
   }

$insert_id[]=$posts->insert('article_profiles',$keys,$values);
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
$projects=$posts->select('article_profiles',"user_id='$user_id' and profile_title like'%$q%'",'*','user_id'); 
elseif(isset($_GET['plist'])):
 $limit=$_GET['plist'];
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id',$limit); 
else:  
$projects=$posts->select('article_profiles',"user_id='$user_id'",'*','user_id'); 
endif; 
foreach ($projects as $key => $value):
?> 
<!-- list of the all projects-->
<div class="row box box box-primary">
<div class="col-md-12"> 
<h4><?php echo $value['profile_title'];?> (Advertising & Marketing) (created: <?php echo $value['addeddate'];?>) )</h3>
</div>
<div class="col-md-12"> 
<h5>Folder: <?php echo $posts->get_field('project_folder',"folder_id='$value[folder_id]'","folder_name");?></h5>
</div>
<div class="col-md-6">  
<ul class="list-group">
<li class="list-group-item">Number of articles</li>
<li class="list-group-item">Number of completed posts</li>
<li class="list-group-item">Number of queued posts</li>
<li class="list-group-item">Total Cost</li>
</ul>
</div>
<div class="col-md-6">  
<ul>
<li class="list-group-item"><a href="article" ><?php echo $value['number_articles'];?></a></li>
<li class="list-group-item"><a href="#" ><?php echo $value['number_posts'];?></a></li>
<li class="list-group-item"><a href="#" ><?php echo $value['number_os_articles'];?></a></li>
<li class="list-group-item"><?php echo $value['totalcost'];?> credits</li>
</ul>
</div>
<div class="col-md-12">  
<a href="#" data-toggle="modal" data-target="#editmodel" data-title="Edit Project"><button class="btn  btn-default btn-xs">Edit</button></a>
<a href="article?profile_id=<?php echo base64_encode($value['profile_id']);?>"><button class="btn  btn-default btn-xs">Manage Articles</button></a>
<a href="Write-Article?profile_id=<?php echo base64_encode($value['profile_id']);?>&&folder_id=<?php echo base64_encode($value['folder_id']);?>"><button class="btn  btn-default btn-xs">Write Article</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Upload Articles</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Outsource Articles</button></a>
<a href="#"><button class="btn  btn-default btn-xs">Article Wizard</button></a>
</div>
</div>    
<!--   end of listing of the projects -->
<?php endforeach;?>

      

















   
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include('main-footer.php');?>
